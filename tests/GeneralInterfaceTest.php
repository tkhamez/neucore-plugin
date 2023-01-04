<?php

declare(strict_types=1);

namespace Tests;

use Neucore\Plugin\GeneralInterface;
use Neucore\Plugin\PluginConfiguration;
use Neucore\Plugin\PluginInterface;
use PHPUnit\Framework\TestCase;

class GeneralInterfaceTest extends TestCase
{
    public function testConstruct()
    {
        $obj = new TestGeneral(new TestLogger(), new PluginConfiguration(0, [], ''), new TestFactory());
        $this->assertInstanceOf(PluginInterface::class, $obj);
        $this->assertInstanceOf(GeneralInterface::class, $obj);
    }
}
