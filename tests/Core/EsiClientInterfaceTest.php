<?php

declare(strict_types=1);

namespace Tests\Core;

use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ResponseInterface;

class EsiClientInterfaceTest extends TestCase
{
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
    public function testCreateHttpClient()
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
