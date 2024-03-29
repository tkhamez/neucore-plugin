<?php

/** @noinspection PhpUnused */

declare(strict_types=1);

namespace Neucore\Plugin\Core;

use Neucore\Plugin\Data\CoreCharacter;
use Neucore\Plugin\Data\CoreEsiToken;
use Neucore\Plugin\Data\CoreGroup;
use Neucore\Plugin\Data\CoreMemberTracking;

/**
 * Provides various data.
 *
 * Methods with a parameter return null if it's invalid (e.g. corporation does not exist).
 */
interface DataInterface
{
    /**
     * @return int[]|null
     */
    public function getCharacterIdsByCorporation(int $corporationId): ?array;

    /**
     * @return CoreCharacter[]|null The corporation and alliance properties of the object will be null.
     */
    public function getCharactersByCorporation(int $corporationId): ?array;

    /**
     * @return CoreMemberTracking[]|null
     */
    public function getMemberTracking(int $corporationId): ?array;

    public function getCharacter(int $characterId): ?CoreCharacter;

    /**
     * Returns all ESI tokens from the character.
     *
     * @return CoreEsiToken[]|null The corporation and alliance properties of the CoreCharacter object will be null.
     */
    public function getCharacterTokens(int $characterId): ?array;

    public function getPlayerId(int $characterId): ?int;

    /**
     * @return string[]
     */
    public function getEveLoginNames(): array;

    /**
     * Returns all ESI tokens for an EVE login, except for the default login.
     *
     * @return CoreEsiToken[]|null
     */
    public function getLoginTokens(string $eveLoginName): ?array;

    /**
     * @return CoreGroup[]
     */
    public function getGroups(): array;

    /**
     * @return CoreGroup[]|null
     */
    public function getCorporationGroups(int $corporationId): ?array;

    /**
     * @return CoreGroup[]|null
     */
    public function getAllianceGroups(int $allianceId): ?array;
}
