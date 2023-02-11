<?php

declare(strict_types=1);

namespace Tests\Core;

use PHPUnit\Framework\TestCase;

class OutputInterfaceTest extends TestCase
{
    /**
     * @throws \ReflectionException
     */
    public function testWrite()
    {
        $method = new \ReflectionMethod(new TestOutput(), 'write');
        $this->assertSame('void', $method->getReturnType()->getName());

        $params = $method->getParameters();
        $this->assertSame(1, count($params));
        $this->assertSame('string', $params[0]->getType()->getName());
    }

    /**
     * @throws \ReflectionException
     */
    public function testWriteLine()
    {
        $method = new \ReflectionMethod(new TestOutput(), 'writeLine');
        $this->assertSame('void', $method->getReturnType()->getName());

        $params = $method->getParameters();
        $this->assertSame(1, count($params));
        $this->assertSame('string', $params[0]->getType()->getName());
    }
}
