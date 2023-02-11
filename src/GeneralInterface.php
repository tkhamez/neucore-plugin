<?php

declare(strict_types=1);

namespace Neucore\Plugin;

use Neucore\Plugin\Core\OutputInterface;
use Neucore\Plugin\Data\NavigationItem;

interface GeneralInterface extends PluginInterface
{
    /**
     * @return NavigationItem[]
     */
    public function getNavigationItems(): array;

    /**
     * Called by the command "bin/console plugin {id}", where {id} is the plugin ID.
     *
     * @param string[] $arguments All arguments
     * @param array<string, string> $options All long options
     * @throws Exception
     */
    public function command(array $arguments, array $options, OutputInterface $output): void;
}
