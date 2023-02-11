<?php

namespace Tests\Core;

use Neucore\Plugin\Core\OutputInterface;

class TestOutput implements OutputInterface
{
    public string $output = '';

    public function write(string $message): void
    {
        $this->output = $message;
    }

    public function writeLine(string $message): void
    {
    }
}
