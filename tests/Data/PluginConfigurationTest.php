<?php

declare(strict_types=1);

namespace Tests\Data;

use Neucore\Plugin\Data\PluginConfiguration;
use PHPUnit\Framework\TestCase;

class PluginConfigurationTest extends TestCase
{
    public function testConstruct()
    {
        $obj = new PluginConfiguration(1, true, [2], '3');
        $this->assertSame(1, $obj->id);
        $this->assertTrue($obj->active);
        $this->assertSame([2], $obj->requiredGroups);
        $this->assertSame('3', $obj->configurationData);
    }
}
