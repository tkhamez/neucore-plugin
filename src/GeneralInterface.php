<?php

declare(strict_types=1);

namespace Neucore\Plugin;

interface GeneralInterface extends PluginInterface
{
    /**
     * @return NavigationItem[]
     */
    public function getNavigationItems(): array;
}
