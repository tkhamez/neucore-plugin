<?php

declare(strict_types=1);

namespace Neucore\Plugin\Data;

class PluginConfiguration
{
    public int $id;

    public string $name;

    public bool $active;

    /**
     * @var int[]
     */
    public array $requiredGroups = [];

    public string $configurationData = '';

    /**
     * @param int[] $requiredGroups
     */
    public function __construct(int $id, string $name, bool $active, array $requiredGroups, string $configurationData)
    {
        $this->id = $id;
        $this->name = $name;
        $this->active = $active;
        $this->requiredGroups = $requiredGroups;
        $this->configurationData = $configurationData;
    }
}
