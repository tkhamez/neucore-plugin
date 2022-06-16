<?php

declare(strict_types=1);

namespace Neucore\Plugin;

class CoreGroup
{
    /**
     * Neucore group ID.
     */
    public int $identifier;

    /**
     * Neucore group name.
     */
    public string $name;

    public function __construct(int $identifier, string $name)
    {
        $this->identifier = $identifier;
        $this->name = $name;
    }
}
