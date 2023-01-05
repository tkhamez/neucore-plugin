<?php

declare(strict_types=1);

namespace Tests\Core;

use Neucore\Plugin\Core\EsiClientInterface;
use PHPUnit\Framework\TestCase;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestInterface;
use Symfony\Component\Yaml\Parser;

class FactoryInterfaceTest extends TestCase
{
    /**
     * @throws \ReflectionException
     */
    public function testConstruct()
    {
        $this->expectExceptionMessage('Method Tests\Core\TestFactory::__construct() does not exist');
        new \ReflectionMethod(new TestFactory(), '__construct');
    }

    /**
     * @throws \ReflectionException
     */
    public function testCreateHttpClient()
    {
        $method = new \ReflectionMethod(new TestFactory(), 'createHttpClient');
        $this->assertSame(ClientInterface::class, $method->getReturnType()->getName());

        $params = $method->getParameters();
        $this->assertSame(1, count($params));
        $this->assertSame('string', $params[0]->getType()->getName());
    }

    /**
     * @throws \ReflectionException
     */
    public function testCreateHttpRequest()
    {
        $method = new \ReflectionMethod(new TestFactory(), 'createHttpRequest');
        $this->assertSame(RequestInterface::class, $method->getReturnType()->getName());

        $params = $method->getParameters();
        $this->assertSame(4, count($params));
        $this->assertSame('string', $params[0]->getType()->getName());
        $this->assertSame('string', $params[1]->getType()->getName());
        $this->assertSame('array', $params[2]->getType()->getName());
        $this->assertSame('string', $params[3]->getType()->getName());
    }

    /**
     * @throws \ReflectionException
     */
    public function testCreateSymfonyYamlParser()
    {
        $method = new \ReflectionMethod(new TestFactory(), 'createSymfonyYamlParser');
        $this->assertSame(Parser::class, $method->getReturnType()->getName());

        $params = $method->getParameters();
        $this->assertSame(0, count($params));
    }

    /**
     * @throws \ReflectionException
     */
    public function testGetEsiClient()
    {
        $method = new \ReflectionMethod(new TestFactory(), 'getEsiClient');
        $this->assertSame(EsiClientInterface::class, $method->getReturnType()->getName());

        $params = $method->getParameters();
        $this->assertSame(0, count($params));
    }
}
