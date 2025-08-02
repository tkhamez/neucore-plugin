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

    public function testConstruct()
    {
        $this->expectExceptionMessage('Method Neucore\Plugin\Core\EsiClientInterface::__construct() does not exist');
        new \ReflectionMethod(EsiClientInterface::class, '__construct');
    }

    public function testGetErrorLimitRemaining()
    {
        $method = new \ReflectionMethod(EsiClientInterface::class, 'getErrorLimitRemaining');
        $this->assertSame('int', $method->getReturnType()->getName());
        $this->assertFalse($method->getReturnType()->allowsNull());

        $params = $method->getParameters();
        $this->assertSame(0, count($params));
    }

    public function testSetCompatibilityDate()
    {
        $method = new \ReflectionMethod(EsiClientInterface::class, 'setCompatibilityDate');
        $this->assertSame('void', $method->getReturnType()->getName());

        $params = $method->getParameters();
        $this->assertSame(1, count($params));
        $this->assertSame('string', $params[0]->getType()->getName());
    }

    public function testRequest()
    {
        $method = new \ReflectionMethod(EsiClientInterface::class, 'request');
        $this->assertSame(ResponseInterface::class, $method->getReturnType()->getName());
        $this->assertFalse($method->getReturnType()->allowsNull());

        $params = $method->getParameters();
        $this->assertSame(8, count($params));
        $this->assertSame('string', $params[0]->getType()->getName());
        $this->assertSame('string', $params[1]->getType()->getName());
        $this->assertSame('string', $params[2]->getType()->getName());
        $this->assertSame('int', $params[3]->getType()->getName());
        $this->assertSame('string', $params[4]->getType()->getName());
        $this->assertSame('bool', $params[5]->getType()->getName());
        $this->assertSame('string', $params[6]->getType()->getName());
        $this->assertSame('string', $params[7]->getType()->getName());
    }
}
