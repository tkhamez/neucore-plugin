<?php

declare(strict_types=1);

namespace Tests;

use Neucore\Plugin\ServiceConfiguration;
use PHPUnit\Framework\TestCase;

class ServiceConfigurationTest extends TestCase
{
    public function testConstruct()
    {
        $obj = new ServiceConfiguration(1, [2], '3');
        $this->assertSame(1, $obj->id);
        $this->assertSame([2], $obj->requiredGroups);
        $this->assertSame('3', $obj->configurationData);
    }
}
