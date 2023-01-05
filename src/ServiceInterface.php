<?php

declare(strict_types=1);

namespace Neucore\Plugin;

use Neucore\Plugin\Data\CoreCharacter;
use Neucore\Plugin\Data\CoreGroup;
use Neucore\Plugin\Data\ServiceAccountData;

/**
 * Methods to implement for a Neucore service.
 *
 * The $groups parameter of all methods contains groups from the player of the character. This respects the
 * "Groups Deactivation" configuration, including the delay.
 */
interface ServiceInterface extends PluginInterface
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

    /**
     * Returns all accounts for the characters provided.
     *
     * @param CoreCharacter[] $characters All characters belong to the same player, but there may be more characters
     *                                    on the player account.
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
     * Called at the end while merging two player accounts, before getAccounts() and updateAccount() are called.
     *
     * This is meant for services that only allow one service account per Core account.
     *
     * @return bool True on success (moved account or nothing to move), false if an existing service account could
     *              not be moved, e.g. because there's already one for the target player account.
     * @throws Exception On error.
     */
    public function moveServiceAccount(int $toPlayerId, int $fromPlayerId): bool;

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
     * Returns service accounts that matches the query name (partial match, min 3 characters).
     *
     * @return ServiceAccountData[]
     * @throws Exception
     */
    public function search(string $query): array;
}
