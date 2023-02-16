<?php

/** @noinspection PhpUnused */

declare(strict_types=1);

namespace Neucore\Plugin\Core;

use Neucore\Plugin\Data\CoreCharacter;
use Neucore\Plugin\Data\CoreEsiToken;
use Neucore\Plugin\Data\CoreGroup;

interface DataInterface
{
    /**
     * @return CoreCharacter[]
     */
    public function getCharactersByCorporation(int $corporationId): array;

    public function getCharacter(int $characterId): ?CoreCharacter;

    /**
     * Returns all ESI tokens from the character.
     *
     * @return CoreEsiToken[]
     */
    public function getCharacterTokens(int $characterId): array;

    public function getPlayerId(int $characterId): ?int;

    /**
     * @return string[]
     */
    public function getEveLoginNames(): array;

    /**
     * Returns all ESI tokens for an EVE login, except for the default login.
     *
     * @return CoreEsiToken[]
     */
    public function getLoginTokens(string $eveLoginName): array;

    /**
     * @return CoreGroup[]
     */
    public function getGroups(): array;
}
