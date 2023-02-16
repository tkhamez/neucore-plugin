<?php

declare(strict_types=1);

namespace Tests\Core;

use Neucore\Plugin\Core\OutputInterface;
use PHPUnit\Framework\TestCase;

class OutputInterfaceTest extends TestCase
{
    public function testConstruct()
    {
        $this->expectExceptionMessage('Method Neucore\Plugin\Core\OutputInterface::__construct() does not exist');
        new \ReflectionMethod(OutputInterface::class, '__construct');
    }

    public function testWrite()
    {
        $method = new \ReflectionMethod(OutputInterface::class, 'write');
        $this->assertSame('void', $method->getReturnType()->getName());

        $params = $method->getParameters();
        $this->assertSame(1, count($params));
        $this->assertSame('string', $params[0]->getType()->getName());
    }

    public function testWriteLine()
    {
        $method = new \ReflectionMethod(OutputInterface::class, 'writeLine');
        $this->assertSame('void', $method->getReturnType()->getName());

        $params = $method->getParameters();
        $this->assertSame(1, count($params));
        $this->assertSame('string', $params[0]->getType()->getName());
    }
}
