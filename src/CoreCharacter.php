<?php

declare(strict_types=1);

namespace Neucore\Plugin;

class CoreCharacter
{
    /**
     * EVE character ID.
     *
     * @var int
     */
    public $id;

    /**
     * Neucore player (account) ID.
     *
     * Will be 0 if the character does not exist in the database.
     *
     * @var int
     */
    public $playerId;

    /**
     * Neucore main character.
     *
     * @var bool|null
     */
    public $main;

    /**
     * EVE character name.
     *
     * @var string|null
     */
    public $name;

    /**
     * Character owner hash.
     *
     * @var string|null
     */
    public $ownerHash;

    /**
     * EVE corporation ID.
     *
     * @var int|null
     */
    public $corporationId;

    /**
     * EVE corporation name.
     *
     * @var string|null
     */
    public $corporationName;

    /**
     * EVE corporation ticker.
     *
     * @var string|null
     */
    public $corporationTicker;

    /**
     * EVE alliance ID.
     *
     * @var int|null
     */
    public $allianceId;

    /**
     * EVE alliance name.
     *
     * @var string|null
     */
    public $allianceName;

    /**
     * EVE alliance ticker.
     *
     * @var string|null
     */
    public $allianceTicker;

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
