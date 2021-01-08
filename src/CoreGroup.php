<?php

declare(strict_types=1);

namespace Neucore\Plugin;

class CoreGroup
{
    /**
     * Neucore group ID.
     *
     * @var int
     */
    public $identifier;

    /**
     * Neucore group name.
     *
     * @var string
     */
    public $name;

    public function __construct(int $identifier, string $name)
    {
        $this->identifier = $identifier;
        $this->name = $name;
    }
}
