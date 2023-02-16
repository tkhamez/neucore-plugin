<?php

declare(strict_types=1);

namespace Tests;

use Neucore\Plugin\Data\NavigationItem;
use Neucore\Plugin\Data\PluginConfiguration;
use Neucore\Plugin\Exception;
use Neucore\Plugin\GeneralInterface;
use Neucore\Plugin\PluginInterface;
use PHPUnit\Framework\TestCase;

class GeneralInterfaceTest extends TestCase
{
    public function testConstruct()
    {
        $obj = new TestGeneral(new TestLogger(), new PluginConfiguration(0, true, [], ''), new TestFactory());
        $this->assertInstanceOf(PluginInterface::class, $obj);
        $this->assertInstanceOf(GeneralInterface::class, $obj);
    }

    public function testGetNavigationItems()
    {
        $obj = new TestGeneral(new TestLogger(), new PluginConfiguration(0, true, [], ''), new TestFactory());
        $actual = $obj->getNavigationItems();
        $this->assertSame(1, count($actual));
        $this->assertInstanceOf(NavigationItem::class, $actual[0]);
    }

    /**
     * @throws Exception
     */
    public function testCommand()
    {
        $obj = new TestGeneral(new TestLogger(), new PluginConfiguration(0, true, [], ''), new TestFactory());
        $out = new TestOutput();
        $obj->command(['arg'], ['opt' => 'val'], $out);
        $this->assertSame('executed', $out->output);
    }
}
