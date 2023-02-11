<?php

declare(strict_types=1);

namespace Neucore\Plugin\Core;
interface OutputInterface
{
    /**
     * Writes a message to the output.
     */
    public function write(string $message): void;

    /**
     * Writes a message to the output and adds a newline at the end.
     */
    public function writeLine(string $message): void;
}
