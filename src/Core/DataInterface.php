<?php

declare(strict_types=1);

namespace Neucore\Plugin\Core;

use Neucore\Plugin\Data\CoreCharacter;
use Neucore\Plugin\Data\EsiToken;

interface DataInterface
{
    public function getCharacter(int $characterId): ?CoreCharacter;

    /**
     * Returns all ESI tokens from the character.
     *
     * @return EsiToken[]
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
     * @return EsiToken[]
     */
    public function getLoginTokens(string $eveLoginName): array;
}
