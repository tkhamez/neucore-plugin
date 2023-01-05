<?php

declare(strict_types=1);

namespace Tests\Data;

use Neucore\Plugin\Data\NavigationItem;
use PHPUnit\Framework\TestCase;

class NavigationItemTest extends TestCase
{
    public function testConstants()
    {
        $this->assertSame('root', NavigationItem::PARENT_ROOT);
        $this->assertSame('management', NavigationItem::PARENT_MANAGEMENT);
        $this->assertSame('administration', NavigationItem::PARENT_ADMINISTRATION);
        $this->assertSame('member_data', NavigationItem::PARENT_MEMBER_DATA);
    }

    public function testJsonSerialize()
    {
        $this->assertSame(
            ['parent' => NavigationItem::PARENT_ROOT, 'name' => 'Name', 'url' => '/test', 'target' => '_self'],
            (new NavigationItem(NavigationItem::PARENT_ROOT, 'Name', '/test'))->jsonSerialize()
        );
    }

    public function testGetParent()
    {
        $this->assertSame(
            NavigationItem::PARENT_ROOT,
            (new NavigationItem(NavigationItem::PARENT_ROOT, 'Name', '/test'))->getParent()
        );
    }

    public function testGetName()
    {
        $this->assertSame(
            'Name',
            (new NavigationItem(NavigationItem::PARENT_ROOT, 'Name', '/test'))->getName()
        );
    }

    public function testGetUrl()
    {
        $this->assertSame(
            '/test',
            (new NavigationItem(NavigationItem::PARENT_ROOT, 'Name', '/test'))->getUrl()
        );
    }

    public function testGetTarget()
    {
        $this->assertSame(
            '_blank',
            (new NavigationItem(NavigationItem::PARENT_ROOT, 'Name', '/test', '_blank'))->getTarget()
        );
    }
}
