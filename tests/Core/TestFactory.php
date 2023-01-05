<?php

declare(strict_types=1);

namespace Tests\Core;

use Neucore\Plugin\Core\EsiClientInterface;
use Neucore\Plugin\Core\FactoryInterface;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestInterface;
use Symfony\Component\Yaml\Parser;

class TestFactory implements FactoryInterface
{
    /** @noinspection PhpInconsistentReturnPointsInspection */
    public function createHttpClient(string $userAgent = ''): ClientInterface
    {
    }

    /** @noinspection PhpInconsistentReturnPointsInspection */
    public function createHttpRequest(
        string $method, string $url,
        array $headers = [],
        string $body = null
    ): RequestInterface {
    }

    /** @noinspection PhpInconsistentReturnPointsInspection */
    public function createSymfonyYamlParser(): Parser
    {
    }

    /** @noinspection PhpInconsistentReturnPointsInspection */
    public function getEsiClient(): EsiClientInterface
    {
    }
}
