<?php

declare(strict_types=1);

namespace Tests\Data;

use Neucore\Plugin\Data\CoreRole;
use Neucore\Plugin\Data\NavigationItem;
use PHPUnit\Framework\TestCase;

class NavigationItemTest extends TestCase
{
    public function testConstants()
    {
        $this->assertSame('root', NavigationItem::PARENT_ROOT);
        $this->assertSame('services', NavigationItem::PARENT_SERVICE);
        $this->assertSame('management', NavigationItem::PARENT_MANAGEMENT);
        $this->assertSame('administration', NavigationItem::PARENT_ADMINISTRATION);
        $this->assertSame('member_data', NavigationItem::PARENT_MEMBER_DATA);
    }

    public function testJsonSerialize()
    {
        $this->assertSame(
            [
                'parent' => NavigationItem::PARENT_ROOT,
                'name' => 'Name',
                'url' => '/test',
                'target' => '_blank',
                'roles' => [CoreRole::PLUGIN_ADMIN],
                'groups' => [1, 2],
                'managerGroups' => [3],
            ],
            (new NavigationItem(
                NavigationItem::PARENT_ROOT,
                'Name',
                '/test',
                '_blank',
                [CoreRole::PLUGIN_ADMIN],
                [1, 2],
                [3]
            ))->jsonSerialize()
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
            '_self',
            (new NavigationItem(NavigationItem::PARENT_ROOT, 'Name', '/test'))->getTarget()
        );
        $this->assertSame(
            '_blank',
            (new NavigationItem(NavigationItem::PARENT_ROOT, 'Name', '/test', '_blank'))->getTarget()
        );
    }

    public function testGetRoles()
    {
        $this->assertSame(
            [CoreRole::USER],
            (new NavigationItem(NavigationItem::PARENT_ROOT, 'Name', '/test'))
                ->getRoles()
        );
        $this->assertSame(
            [CoreRole::ANONYMOUS],
            (new NavigationItem(NavigationItem::PARENT_ROOT, 'Name', '/t', roles: [CoreRole::ANONYMOUS]))->getRoles()
        );
    }

    public function testGetGroups()
    {
        $this->assertSame(
            [],
            (new NavigationItem(NavigationItem::PARENT_ROOT, 'Name', '/test'))->getGroups()
        );
        $this->assertSame(
            [1, 2],
            (new NavigationItem(NavigationItem::PARENT_ROOT, 'Name', '/test', groups: [1, 2]))->getGroups()
        );
    }

    public function testGetManagerGroups()
    {
        $this->assertSame(
            [],
            (new NavigationItem(NavigationItem::PARENT_ROOT, 'Name', '/test'))->getManagerGroups()
        );
        $this->assertSame(
            [3],
            (new NavigationItem(NavigationItem::PARENT_ROOT, 'Name', '/test', managerGroups: [3]))->getManagerGroups()
        );
    }
}
