<?php

declare(strict_types=1);

namespace Neucore\Plugin;

class ServiceConfiguration
{
    /**
     * @var int
     */
    public $id;

    /**
     * @var int[]
     */
    public $requiredGroups = [];

    /**
     * @OA\Property()
     * @var string
     */
    public $configurationData = '';

    public function __construct(int $id, array $requiredGroups, string $configurationData)
    {
        $this->id = $id;
        $this->requiredGroups = $requiredGroups;
        $this->configurationData = $configurationData;
    }
}
