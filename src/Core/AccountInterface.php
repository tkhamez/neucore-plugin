<?php

/** @noinspection PhpUnused */

declare(strict_types=1);

namespace Neucore\Plugin\Core;

use Neucore\Plugin\Data\CoreAccount;
use Neucore\Plugin\Data\CoreCharacter;
use Neucore\Plugin\Data\CoreGroup;
use Neucore\Plugin\Data\CoreRole;

interface AccountInterface
{
    /**
     * Returns all group members.
     *
     * @return CoreAccount[]
     */
    public function getAccountsByGroup(int $groupId): array;

    /**
     * Returns all group managers.
     *
     * @return CoreAccount[]
     */
    public function getAccountsByGroupManager(int $groupId): array;

    /**
     * Returns all accounts with a role, except for the "user" role.
     *
     * @return CoreAccount[]
     */
    public function getAccountsByRole(string $roleName): array;

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
