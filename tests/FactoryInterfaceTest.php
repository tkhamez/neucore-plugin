<?php

declare(strict_types=1);

namespace Tests;

use Neucore\Plugin\FactoryInterface;
use PHPUnit\Framework\TestCase;

class FactoryInterfaceTest extends TestCase
{
    public function testConstruct()
    {
        $this->assertInstanceOf(FactoryInterface::class, new TestFactory());
    }
}
