<?php

declare(strict_types=1);

namespace Tests\Core;

use Neucore\Plugin\Core\EsiClientInterface;
use Psr\Http\Message\ResponseInterface;

class TestEsiClient implements EsiClientInterface
{
    /** @noinspection PhpInconsistentReturnPointsInspection */
    public function request(
        string $esiPath,
        string $method = 'GET',
        string $body = null,
        int $characterId = null,
        string $eveLoginName = self::DEFAULT_LOGIN_NAME,
        bool $debug = false
    ): ResponseInterface {
    }
}
