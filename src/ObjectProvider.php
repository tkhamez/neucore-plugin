<?php

declare(strict_types=1);

namespace Neucore\Plugin;

use GuzzleHttp\Client;
use Psr\Http\Client\ClientInterface;
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

    public static function getSymfonyYamlParser(): Parser
    {
        return new Parser();
    }
}
