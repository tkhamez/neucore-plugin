<?php

declare(strict_types=1);

namespace Neucore\Plugin\Data;

class CoreAccount
{
    /**
     * The main character of the logged in player.
     */
    public CoreCharacter $main;

    /**
     * All characters of the player.
     *
     * @var CoreCharacter[]
     */
    public array $characters;

    /**
     * All groups of which the player is a member.
     *
     * @var CoreGroup[]
     */
    public array $memberGroups;

    /**
     * True if the "Groups Deactivation" feature is enabled and groups for this account are currently deactivated
     * (delay is respected).
     */
    public bool $groupsDeactivated = false;

    /**
     * All groups of which the player is a manager.
     *
     * @var CoreGroup[]
     */
    public array $managerGroups;

    /**
     * All roles of the player.
     *
     * @var CoreRole[]
     */
    public array $roles;

    /**
     * @param CoreCharacter $main
     * @param CoreCharacter[] $characters
     * @param CoreGroup[] $memberGroups
     * @param CoreGroup[] $managerGroups
     * @param CoreRole[] $roles
     */
    public function __construct(
        CoreCharacter $main,
        array $characters,
        array $memberGroups,
        array $managerGroups,
        array $roles,
    )
    {
        $this->main = $main;
        $this->characters = $characters;
        $this->memberGroups = $memberGroups;
        $this->managerGroups = $managerGroups;
        $this->roles = $roles;
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
