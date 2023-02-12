<?php

declare(strict_types=1);

namespace Neucore\Plugin\Core;

use Neucore\Plugin\Data\CoreAccount;
use Neucore\Plugin\Data\CoreCharacter;
use Neucore\Plugin\Data\CoreGroup;
use Neucore\Plugin\Data\CoreRole;

interface AccountInterface
{
    public function getCharacter(int $characterId): ?CoreCharacter;

    public function getPlayerId(int $characterId): ?int;

    public function getAccount(int $playerId): ?CoreAccount;

    public function getMain(int $playerId): ?CoreCharacter;

    /**
     * @return CoreCharacter[]
     */
    public function getCharacters(int $playerId): array;

    /**
     * @return CoreGroup[]
     */
    public function getMemberGroups(int $playerId): array;

    public function groupsDeactivated(int $playerId): bool;

    /**
     * @return CoreGroup[]
     */
    public function getManagerGroups(int $playerId): array;

    /**
     * @return CoreRole[]
     */
    public function getRoles(int $playerId): array;
}
