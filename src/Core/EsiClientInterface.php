<?php

/** @noinspection PhpUnused */

declare(strict_types=1);

namespace Neucore\Plugin\Core;

use Psr\Http\Message\ResponseInterface;

interface EsiClientInterface
{
    public const DEFAULT_LOGIN_NAME = 'core.default';

    /**
     * Exception message when the ESI error limit has been reached.
     */
    public const ERROR_ERROR_LIMIT_REACHED = 'Error limit reached.';

    /**
     * Exception message when the ESI rate limit has been reached.
     */
    public const ERROR_RATE_LIMIT_REACHED = 'Rate limit reached.';

    /**
     * Exception message when temporarily throttled by ESI.
     */
    public const ERROR_TEMPORARILY_THROTTLED = 'Temporarily throttled.';

    /**
     * Exception message when the character was not found on Neucore.
     */
    public const ERROR_CHARACTER_NOT_FOUND = 'Character not found.';

    /**
     * Exception message when the character does not have a valid ESI token.
     */
    public const ERROR_INVALID_TOKEN = 'Character has no valid token.';

    /**
     * Exception message for any other error.
     */
    public const ERROR_UNKNOWN = 'Unknown error.';

    /**
     * Returns number of errors that should remain while checking the ESI error limit.
     *
     * For example, if this value is 10, the client only allows a value of 10 for the HTTP response header
     * X-Esi-Error-Limit-Remain before failing.
     */
    public function getErrorLimitRemaining(): int;

    /**
     * Makes a request to the EVE API.
     *
     * The responses are cached according to the response headers.
     *
     * This checks various ESI limits (error, rate, throttled) and throws exceptions if the client needs to wait
     * before it can make further requests. The exception code is the Unix timestamp to wait until.
     *
     * @param string $esiPath The full path with query parameters but without the "datasource" parameter,
     *                        e.g. /latest/characters/96061222/assets/?page=1
     * @param string $method HTTP request method.
     * @param string|null $body Optional body for the request, usually JSON encoded.
     * @param int|null $characterId EVE character ID, required for requests that need authorization.
     * @param string $eveLoginName Neucore EVE login name, it determines the ESI token that should be used.
     *                             Valid names can be found in Neucore at Administration -> EVE Logins.
     * @param bool $debug Set to true to disable the response cache.
     * @throws Exception Thrown if a request limit was reached, in this case the exception code will be
     *                   the Unix timestamp to wait until.
     *                   Thrown if the character does not exist or does not have a valid ESI token.
     *                   The exception message will always be one of the ERROR_* constants.
     * @see https://esi.evetech.net
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
