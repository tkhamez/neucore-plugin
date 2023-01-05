<?php

declare(strict_types=1);

namespace Tests;

use Neucore\Plugin\CoreAccount;
use Neucore\Plugin\Exception;
use Neucore\Plugin\FactoryInterface;
use Neucore\Plugin\GeneralInterface;
use Neucore\Plugin\NavigationItem;
use Neucore\Plugin\PluginConfiguration;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Log\LoggerInterface;

class TestGeneral implements GeneralInterface
{
    public function __construct(
        LoggerInterface $logger,
        PluginConfiguration $pluginConfiguration,
        FactoryInterface $factory,
    ) {
    }

    public function onConfigurationChange(): void
    {
    }

    public function request(
        string $name,
        ServerRequestInterface $request,
        ResponseInterface $response,
        ?CoreAccount $coreAccount,
    ): ResponseInterface {
        throw new Exception();
    }

    public function getNavigationItems(): array
    {
        return [new NavigationItem(NavigationItem::PARENT_ROOT, 'Name', '/test')];
    }
}
