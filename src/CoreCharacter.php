<?php

declare(strict_types=1);

namespace Neucore\Plugin;

class CoreCharacter
{
    /**
     * EVE character ID.
     */
    public int $id;

    /**
     * Neucore player (account) ID.
     *
     * Will be 0 if the character does not exist in the database.
     */
    public int $playerId;

    /**
     * Neucore main character.
     */
    public ?bool $main = null;

    /**
     * EVE character name.
     */
    public ?string $name = null;

    /**
     * Character owner hash.
     */
    public ?string $ownerHash = null;

    /**
     * EVE corporation ID.
     */
    public ?int $corporationId = null;

    /**
     * EVE corporation name.
     */
    public ?string $corporationName = null;

    /**
     * EVE corporation ticker.
     */
    public ?string $corporationTicker = null;

    /**
     * EVE alliance ID.
     */
    public ?int $allianceId = null;

    /**
     * EVE alliance name.
     */
    public ?string $allianceName = null;

    /**
     * EVE alliance ticker.
     */
    public ?string $allianceTicker = null;

    public function __construct(
        int $id,
        int $playerId,
        bool $main = null,
        string $name = null,
        string $ownerHash = null,
        int $corporationId = null,
        string $corporationName = null,
        string $corporationTicker = null,
        int $allianceId = null,
        string $allianceName = null,
        string $allianceTicker = null
    ) {
        $this->id = $id;
        $this->playerId = $playerId;
        $this->main = $main;
        $this->name = $name;
        $this->ownerHash = $ownerHash;
        $this->corporationId = $corporationId;
        $this->corporationName = $corporationName;
        $this->corporationTicker = $corporationTicker;
        $this->allianceId = $allianceId;
        $this->allianceName = $allianceName;
        $this->allianceTicker = $allianceTicker;
    }
}
