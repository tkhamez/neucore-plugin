<?php

declare(strict_types=1);

namespace Neucore\Plugin\Core;

use Neucore\Plugin\Exception;
use Psr\Http\Message\ResponseInterface;

interface EsiClientInterface
{
    public const DEFAULT_LOGIN_NAME = 'core.default';

    /**
     * @param string $eveLoginName Valid names can be found in Neucore at Administration -> EVE Logins.
     * @throws Exception If character or a valid token could not be found.
     */
    public function request(
        string $esiPath,
        string $method = 'GET',
        string $body = null,
        int $characterId = null,
        string $eveLoginName = self::DEFAULT_LOGIN_NAME,
        bool $debug = false,
    ): ResponseInterface;
}
