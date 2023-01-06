<?php

declare(strict_types=1);

namespace Tests\Core;

use Neucore\Plugin\Core\EsiClientInterface;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ResponseInterface;

class EsiClientInterfaceTest extends TestCase
{
    public function testConstants()
    {
        $this->assertSame('core.default', EsiClientInterface::DEFAULT_LOGIN_NAME);
        $this->assertSame('Error limit reached.', EsiClientInterface::ERROR_ERROR_LIMIT_REACHED);
        $this->assertSame('Rate limit reached.', EsiClientInterface::ERROR_RATE_LIMIT_REACHED);
        $this->assertSame('Temporarily throttled.', EsiClientInterface::ERROR_TEMPORARILY_THROTTLED);
        $this->assertSame('Character not found.', EsiClientInterface::ERROR_CHARACTER_NOT_FOUND);
        $this->assertSame('Character has no valid token.', EsiClientInterface::ERROR_INVALID_TOKEN);
        $this->assertSame('Unknown error.', EsiClientInterface::ERROR_UNKNOWN);
    }

    /**
     * @throws \ReflectionException
     */
    public function testConstruct()
    {
        $this->expectExceptionMessage('Method Tests\Core\TestEsiClient::__construct() does not exist');
        new \ReflectionMethod(new TestEsiClient(), '__construct');
    }

    /**
     * @throws \ReflectionException
     */
    public function testGetErrorLimitRemaining()
    {
        $method = new \ReflectionMethod(new TestEsiClient(), 'getErrorLimitRemaining');
        $this->assertSame('int', $method->getReturnType()->getName());

        $params = $method->getParameters();
        $this->assertSame(0, count($params));
    }

    /**
     * @throws \ReflectionException
     */
    public function testRequest()
    {
        $method = new \ReflectionMethod(new TestEsiClient(), 'request');
        $this->assertSame(ResponseInterface::class, $method->getReturnType()->getName());

        $params = $method->getParameters();
        $this->assertSame(6, count($params));
        $this->assertSame('string', $params[0]->getType()->getName());
        $this->assertSame('string', $params[1]->getType()->getName());
        $this->assertSame('string', $params[2]->getType()->getName());
        $this->assertSame('int', $params[3]->getType()->getName());
        $this->assertSame('string', $params[4]->getType()->getName());
        $this->assertSame('bool', $params[5]->getType()->getName());
    }
}
