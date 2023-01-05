<?php

declare(strict_types=1);

namespace Neucore\Plugin;

use Neucore\Plugin\Data\NavigationItem;

interface GeneralInterface extends PluginInterface
{
    /**
     * @return NavigationItem[]
     */
    public function getNavigationItems(): array;
}
