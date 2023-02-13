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
        /**
         * The main character of the logged in player.
         */
        public CoreCharacter $main,

        /**
         * All characters of the player.
         *
         * @var CoreCharacter[]
         */
        public array $characters,

        /**
         * All groups of which the player is a member.
         *
         * @var CoreGroup[]
         */
        public array $memberGroups,

        /**
         * All groups of which the player is a manager.
         *
         * @var CoreGroup[]
         */
        public array $managerGroups,

        /**
         * All roles of the player.
         *
         * @var CoreRole[]
         */
        public array $roles,
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
