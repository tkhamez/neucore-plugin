<?php

/** @noinspection PhpUnhandledExceptionInspection */

declare(strict_types=1);

namespace Tests\Core;

use Neucore\Plugin\Data\CoreCharacter;
use PHPUnit\Framework\TestCase;

class DataInterfaceTest extends TestCase
{
    public function testConstruct()
    {
        $this->expectExceptionMessage('Method Tests\Core\TestData::__construct() does not exist');
        new \ReflectionMethod(new TestData(), '__construct');
    }

    public function testGetCharacter()
    {
        $method = new \ReflectionMethod(new TestData(), 'getCharacter');
        $this->assertSame(CoreCharacter::class, $method->getReturnType()->getName());
        $this->assertTrue($method->getReturnType()->allowsNull());

        $params = $method->getParameters();
        $this->assertSame(1, count($params));
        $this->assertSame('int', $params[0]->getType()->getName());
    }

    public function testGetCharacterTokens()
    {
        $method = new \ReflectionMethod(new TestData(), 'getCharacterTokens');
        $this->assertSame('array', $method->getReturnType()->getName());
        $this->assertFalse($method->getReturnType()->allowsNull());

        $params = $method->getParameters();
        $this->assertSame(1, count($params));
        $this->assertSame('int', $params[0]->getType()->getName());
    }

    public function testGetPlayerId()
    {
        $method = new \ReflectionMethod(new TestData(), 'getPlayerId');
        $this->assertSame('int', $method->getReturnType()->getName());
        $this->assertTrue($method->getReturnType()->allowsNull());

        $params = $method->getParameters();
        $this->assertSame(1, count($params));
        $this->assertSame('int', $params[0]->getType()->getName());
    }

    public function testGetEveLoginNames()
    {
        $method = new \ReflectionMethod(new TestData(), 'getEveLoginNames');
        $this->assertSame('array', $method->getReturnType()->getName());
        $this->assertFalse($method->getReturnType()->allowsNull());

        $params = $method->getParameters();
        $this->assertSame(0, count($params));
    }

    public function testGetLoginTokens()
    {
        $method = new \ReflectionMethod(new TestData(), 'getLoginTokens');
        $this->assertSame('array', $method->getReturnType()->getName());
        $this->assertFalse($method->getReturnType()->allowsNull());

        $params = $method->getParameters();
        $this->assertSame(1, count($params));
        $this->assertSame('string', $params[0]->getType()->getName());
    }
}
