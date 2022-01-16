<?php

declare(strict_types=1);

namespace Neucore\Plugin;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Log\LoggerInterface;

/**
 * Methods to implement for a Neucore service.
 *
 * The $groups parameter of all methods contains groups from the player of the character. This respects the
 * "Groups Deactivation" configuration, including the delay.
 */
interface ServiceInterface
{
    /**
     * A required e-mail address was not provided.
     */
    public const ERROR_MISSING_EMAIL = 'missing_email';

    /**
     * The e-mail address provided belongs to another account.
     */
    public const ERROR_EMAIL_MISMATCH = 'email_mismatch';

    /**
     * Already requested an invited recently and must wait.
     */
    public const ERROR_INVITE_WAIT = 'invite_wait';

    /**
     * The account for the character was not found.
     */
    public const ERROR_ACCOUNT_NOT_FOUND = 'account_not_found';

    public function __construct(LoggerInterface $logger, ServiceConfiguration $serviceConfiguration);

    /**
     * Returns all accounts for the characters provided.
     *
     * @param CoreCharacter[] $characters All characters belong to the same player, but there may be more.
     * @return ServiceAccountData[]
     * @throws Exception In the event of an error when retrieving accounts.
     */
    public function getAccounts(array $characters): array;

    /**
     * Creates new account and returns account data.
     *
     * This is not called if there is already a service account for this character or if the
     * "Limit to one service account" option is used and there is already a service account associated
     * with any character on the same player account.
     *
     * A player can only register a new account for their main character and only if that account does not
     * already exist or if it's ServiceAccountData::$status is "Deactivated" or "Unknown".
     *
     * @param CoreCharacter $character This is the main character from the player account.
     * @param CoreGroup[] $groups
     * @param string $emailAddress
     * @param int[] $allCharacterIds All EVE character IDs from the same player account.
     * @return ServiceAccountData
     * @throws Exception On error, the message should be one of the self::ERROR_* constants
     *                   (it will be shown to the user with a 409 response code) or empty (500 response code).
     */
    public function register(
        CoreCharacter $character,
        array $groups,
        string $emailAddress,
        array $allCharacterIds
    ): ServiceAccountData;

    /**
     * Updates account information.
     *
     * This is called when the user clicks the update button and by the "update-service-accounts" command.
     * This is not called if there is no account for the character.
     *
     * If the character does not exist on Neucore, this will still be called when updating all accounts,
     * in which case the CoreCharacter $id property will be the character ID, the $playerId will be 0 and all other
     * properties will be null.
     *
     * @param CoreCharacter $character
     * @param CoreGroup[] $groups
     * @param CoreCharacter|null $mainCharacter
     * @throws Exception On error. If the exceptions contains a message it will be shown to the user.
     */
    public function updateAccount(CoreCharacter $character, array $groups, ?CoreCharacter $mainCharacter): void;

    /**
     * Updates account information.
     *
     * This is called by the "update-service-accounts" command.
     * This is not called if there is no account for the player.
     *
     * This will still be called if there is no main character on the player account, in which case the
     * CoreCharacter $id property will be 0, the $playerId will be the player ID and all other properties
     * will be null.
     *
     * @param CoreGroup[] $groups
     * @throws Exception On error
     */
    public function updatePlayerAccount(CoreCharacter $mainCharacter, array $groups): void;

    /**
     * Resets and returns the password for the account of the provided character.
     *
     * This is not called if there is no account for the character.
     *
     * @param int $characterId
     * @return string
     * @throws Exception
     */
    public function resetPassword(int $characterId): string;

    /**
     * Returns a list of all accounts.
     *
     * Used by the "update-service-accounts" command to update accounts with self::updateAccount().
     *
     * Implement this if there can be several service accounts for a Neucore player account.
     *
     * @return int[] EVE character IDs
     * @throws Exception
     */
    public function getAllAccounts(): array;

    /**
     * Returns a list of all accounts.
     *
     * Used by the "update-service-accounts" command to update accounts with self::updatePlayerAccount().
     *
     * Implement this if there is only one service account for a Neucore player account.
     *
     * @return int[] Neucore player IDs
     * @throws Exception
     */
    public function getAllPlayerAccounts(): array;

    /**
     * Called by the URL /plugin/{id}/{name}.
     *
     * {id} is the Service ID from Neucore.
     * Only called if the logged-in user is a member of the required groups, if applicable.
     *
     * @param CoreCharacter $coreCharacter The main character of the player
     * @param string $name The "{name}" part of the URL.
     * @param CoreGroup[] $groups
     * @throws Exception
     */
    public function request(
        CoreCharacter $coreCharacter,
        string $name,
        ServerRequestInterface $request,
        ResponseInterface $response,
        array $groups
    ): ResponseInterface;
}
