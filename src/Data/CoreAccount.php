<?php

declare(strict_types=1);

namespace Neucore\Plugin\Data;

class CoreAccount
{
    /**
     * True if the "Groups Deactivation" feature is enabled and groups for this account are currently deactivated
     * (delay is respected).
     */
    public bool $groupsDeactivated = false;

    public function __construct(
        public int $playerId,

        public string $playerName,

        /**
         * The main character of the logged in player.
         */
        public ?CoreCharacter $main = null,

        /**
         * All characters of the player.
         *
         * @var CoreCharacter[]
         */
        public ?array $characters = null,

        /**
         * All groups of which the player is a member.
         *
         * @var CoreGroup[]
         */
        public ?array $memberGroups = null,

        /**
         * All groups of which the player is a manager.
         *
         * @var CoreGroup[]
         */
        public ?array $managerGroups = null,

        /**
         * All roles of the player.
         *
         * @var CoreRole[]
         */
        public ?array $roles = null,
    ) {
    }

    /**
     * Returns groups if they are not deactivated.
     *
     * @return CoreGroup[]
     */
    public function getMemberGroups(): array
    {
        return $this->groupsDeactivated ? [] : $this->memberGroups;
    }
}
