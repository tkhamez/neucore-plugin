<?php

declare(strict_types=1);

namespace Tests\Data;

use Neucore\Plugin\Data\CoreRole;
use PHPUnit\Framework\TestCase;

class CoreRoleTest extends TestCase
{
    public function testConstants()
    {
        $this->assertSame('anonymous', CoreRole::ANONYMOUS);

        $this->assertSame('user', CoreRole::USER);
        $this->assertSame('user-admin', CoreRole::USER_ADMIN);
        $this->assertSame('user-manager', CoreRole::USER_MANAGER);
        $this->assertSame('user-chars', CoreRole::USER_CHARS);
        $this->assertSame('group-admin', CoreRole::GROUP_ADMIN);
        $this->assertSame('plugin-admin', CoreRole::PLUGIN_ADMIN);
        $this->assertSame('statistics', CoreRole::STATISTICS);
        $this->assertSame('app-admin', CoreRole::APP_ADMIN);
        $this->assertSame('esi', CoreRole::ESI);
        $this->assertSame('settings', CoreRole::SETTINGS);
        $this->assertSame('tracking-admin', CoreRole::TRACKING_ADMIN);
        $this->assertSame('watchlist-admin', CoreRole::WATCHLIST_ADMIN);

        $this->assertSame('group-manager', CoreRole::GROUP_MANAGER);
        $this->assertSame('app-manager', CoreRole::APP_MANAGER);
        $this->assertSame('tracking', CoreRole::TRACKING);
        $this->assertSame('watchlist', CoreRole::WATCHLIST);
        $this->assertSame('watchlist-manager', CoreRole::WATCHLIST_MANAGER);
    }

    public function testConstruct()
    {
        $group = new CoreRole('n');
        $this->assertSame('n', $group->name);
    }
}
