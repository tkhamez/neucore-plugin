<?php

declare(strict_types=1);

namespace Neucore\Plugin\Core;

use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestInterface;
use Symfony\Component\Yaml\Parser;

interface FactoryInterface
{
    public function createHttpClient(string $userAgent = ''): ClientInterface;

    /**
     * @param array $headers e.g. ['Authorization' => 'Bearer token']
     */
    public function createHttpRequest(
        string $method,
        string $url,
        array $headers = [],
        ?string $body = null
    ): RequestInterface;

    public function createSymfonyYamlParser(): Parser;

    public function getEsiClient(): EsiClientInterface;

    public function getAccount(): AccountInterface;

    public function getData(): DataInterface;
}
