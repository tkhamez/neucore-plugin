<?php

declare(strict_types=1);

namespace Neucore\Plugin;

use Neucore\Plugin\Core\FactoryInterface;
use Neucore\Plugin\Data\CoreAccount;
use Neucore\Plugin\Data\PluginConfiguration;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Log\LoggerInterface;

interface PluginInterface
{
    public function __construct(
        LoggerInterface $logger,
        PluginConfiguration $pluginConfiguration,
        FactoryInterface $factory,
    );

    /**
     * Called when the plugin configuration is saved, after the data was successfully written to the database.
     *
     * @throws Exception
     */
    public function onConfigurationChange(): void;

    /**
     * Called by the URL /plugin/{id}/{name}.
     *
     * {id} is the plugin ID from Neucore.
     * Only called if the logged-in user is a member of the required groups, if applicable.
     *
     * @param string $name The "{name}" part of the URL.
     * @param CoreAccount|null $coreAccount Will only be null if the user is not logged in.
     * @throws Exception
     */
    public function request(
        string $name,
        ServerRequestInterface $request,
        ResponseInterface $response,
        ?CoreAccount $coreAccount,
    ): ResponseInterface;
}
