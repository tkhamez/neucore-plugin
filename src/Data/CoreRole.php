<?php

declare(strict_types=1);

namespace Neucore\Plugin\Data;

class CoreRole
{
    public const ANONYMOUS = 'anonymous';

    public const USER = 'user';
    public const USER_ADMIN = 'user-admin';
    public const USER_MANAGER = 'user-manager';
    public const USER_CHARS = 'user-chars';
    public const GROUP_ADMIN = 'group-admin';
    public const PLUGIN_ADMIN = 'plugin-admin';
    public const STATISTICS = 'statistics';
    public const APP_ADMIN = 'app-admin';
    public const ESI = 'esi';
    public const SETTINGS = 'settings';
    public const TRACKING_ADMIN = 'tracking-admin';
    public const WATCHLIST_ADMIN = 'watchlist-admin';

    public const GROUP_MANAGER = 'group-manager';
    public const APP_MANAGER = 'app-manager';
    public const TRACKING = 'tracking';
    public const WATCHLIST = 'watchlist';
    public const WATCHLIST_MANAGER = 'watchlist-manager';

    public function __construct(public string $name)
    {
    }
}
