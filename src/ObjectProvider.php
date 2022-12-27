<?php

declare(strict_types=1);

namespace Neucore\Plugin;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestInterface;
use Symfony\Component\Yaml\Parser;

class ObjectProvider
{
    public static function getHttpClient(string $userAgent = ''): ClientInterface
    {
        $headers = [];

        if (!empty($userAgent)) {
            $headers = [
                'User-Agent' => $userAgent,
            ];
        }

        return new Client([
            'headers' => $headers,
        ]);
    }

    public static function createHttpRequest(
        string $method,
        string $url,
        array $headers = [],
        string $body = null
    ): RequestInterface {
        return new Request($method, $url, $headers, $body);
    }

    public static function getSymfonyYamlParser(): Parser
    {
        return new Parser();
    }
}
