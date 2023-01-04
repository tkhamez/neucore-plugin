<?php

declare(strict_types=1);

namespace Neucore\Plugin;

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
}
