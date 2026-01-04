<?php

declare(strict_types=1);

namespace Neucore\Plugin\Tests\Data;

use Neucore\Plugin\Data\CoreGroup;
use PHPUnit\Framework\TestCase;

class CoreGroupTest extends TestCase
{
    public function testConstruct()
    {
        $group = new CoreGroup(1, 'n');
        $this->assertSame(1, $group->identifier);
        $this->assertSame('n', $group->name);
    }
}
