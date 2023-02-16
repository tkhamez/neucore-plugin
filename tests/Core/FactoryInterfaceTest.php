<?php

declare(strict_types=1);

namespace Tests\Core;

use Neucore\Plugin\Core\AccountInterface;
use Neucore\Plugin\Core\DataInterface;
use Neucore\Plugin\Core\EsiClientInterface;
use Neucore\Plugin\Core\FactoryInterface;
use PHPUnit\Framework\TestCase;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestInterface;
use Symfony\Component\Yaml\Parser;

class FactoryInterfaceTest extends TestCase
{
    public function testConstruct()
    {
        $this->expectExceptionMessage('Method Neucore\Plugin\Core\FactoryInterface::__construct() does not exist');
        new \ReflectionMethod(FactoryInterface::class, '__construct');
    }

    public function testCreateHttpClient()
    {
        $method = new \ReflectionMethod(FactoryInterface::class, 'createHttpClient');
        $this->assertSame(ClientInterface::class, $method->getReturnType()->getName());
        $this->assertFalse($method->getReturnType()->allowsNull());

        $params = $method->getParameters();
        $this->assertSame(1, count($params));
        $this->assertSame('string', $params[0]->getType()->getName());
    }

    public function testCreateHttpRequest()
    {
        $method = new \ReflectionMethod(FactoryInterface::class, 'createHttpRequest');
        $this->assertSame(RequestInterface::class, $method->getReturnType()->getName());
        $this->assertFalse($method->getReturnType()->allowsNull());

        $params = $method->getParameters();
        $this->assertSame(4, count($params));
        $this->assertSame('string', $params[0]->getType()->getName());
        $this->assertSame('string', $params[1]->getType()->getName());
        $this->assertSame('array', $params[2]->getType()->getName());
        $this->assertSame('string', $params[3]->getType()->getName());
    }

    public function testCreateSymfonyYamlParser()
    {
        $method = new \ReflectionMethod(FactoryInterface::class, 'createSymfonyYamlParser');
        $this->assertSame(Parser::class, $method->getReturnType()->getName());
        $this->assertFalse($method->getReturnType()->allowsNull());

        $params = $method->getParameters();
        $this->assertSame(0, count($params));
    }

    public function testGetEsiClient()
    {
        $method = new \ReflectionMethod(FactoryInterface::class, 'getEsiClient');
        $this->assertSame(EsiClientInterface::class, $method->getReturnType()->getName());
        $this->assertFalse($method->getReturnType()->allowsNull());

        $params = $method->getParameters();
        $this->assertSame(0, count($params));
    }

    public function testGetAccount()
    {
        $method = new \ReflectionMethod(FactoryInterface::class, 'getAccount');
        $this->assertSame(AccountInterface::class, $method->getReturnType()->getName());
        $this->assertFalse($method->getReturnType()->allowsNull());

        $params = $method->getParameters();
        $this->assertSame(0, count($params));
    }

    public function testGetData()
    {
        $method = new \ReflectionMethod(FactoryInterface::class, 'getData');
        $this->assertSame(DataInterface::class, $method->getReturnType()->getName());
        $this->assertFalse($method->getReturnType()->allowsNull());

        $params = $method->getParameters();
        $this->assertSame(0, count($params));
    }
}
