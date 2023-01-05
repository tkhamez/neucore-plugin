<?php

declare(strict_types=1);

namespace Neucore\Plugin;

use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestInterface;
use Symfony\Component\Yaml\Parser;

interface FactoryInterface
{
    public function createHttpClient(string $userAgent = ''): ClientInterface;

    public function createHttpRequest(
        string $method,
        string $url,
        array $headers = [],
        string $body = null
    ): RequestInterface;

    public function createSymfonyYamlParser(): Parser;
}
