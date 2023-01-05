<?php

declare(strict_types=1);

namespace Tests;

use Neucore\Plugin\FactoryInterface;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestInterface;
use Symfony\Component\Yaml\Parser;

class TestFactory implements FactoryInterface
{
    public function createHttpClient(string $userAgent = ''): ClientInterface
    {
        // TODO: Implement createHttpClient() method.
    }

    public function createHttpRequest(
        string $method, string $url,
        array $headers = [],
        string $body = null
    ): RequestInterface {
        // TODO: Implement createHttpRequest() method.
    }

    public function createSymfonyYamlParser(): Parser
    {
        // TODO: Implement createSymfonyYamlParser() method.
    }
}
