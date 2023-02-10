<?php

declare(strict_types=1);

namespace Neucore\Plugin\Data;

class PluginConfiguration
{
    public int $id;

    public bool $active;

    /**
     * @var int[]
     */
    public array $requiredGroups = [];

    public string $configurationData = '';

    /**
     * @param int[] $requiredGroups
     */
    public function __construct(int $id, bool $active, array $requiredGroups, string $configurationData)
    {
        $this->id = $id;
        $this->active = $active;
        $this->requiredGroups = $requiredGroups;
        $this->configurationData = $configurationData;
    }
}
