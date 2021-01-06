<?php

declare(strict_types=1);

namespace Neucore\Plugin;

class CoreCharacter
{
    /**
     * @var int
     */
    public $id;

    /**
     * @var bool|null
     */
    public $main;

    /**
     * @var string|null
     */
    public $name;

    /**
     * @var string|null
     */
    public $ownerHash;

    /**
     * @var int|null
     */
    public $corporationId;

    /**
     * @var string|null
     */
    public $corporationName;

    /**
     * @var string|null
     */
    public $corporationTicker;

    /**
     * @var int|null
     */
    public $allianceId;

    /**
     * @var string|null
     */
    public $allianceName;

    /**
     * @var string|null
     */
    public $allianceTicker;

    public function __construct(
        int $id,
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
