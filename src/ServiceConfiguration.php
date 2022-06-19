<?php

declare(strict_types=1);

namespace Neucore\Plugin;

class ServiceConfiguration
{
    public int $id;

    /**
     * @var int[]
     */
    public array $requiredGroups = [];

    public string $configurationData = '';

    /**
     * @param int[] $requiredGroups
     */
    public function __construct(int $id, array $requiredGroups, string $configurationData)
    {
        $this->id = $id;
        $this->requiredGroups = $requiredGroups;
        $this->configurationData = $configurationData;
    }
}