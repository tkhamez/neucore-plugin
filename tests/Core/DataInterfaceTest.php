<?php

declare(strict_types=1);

namespace Neucore\Plugin\Tests\Core;

use Neucore\Plugin\Core\DataInterface;
use Neucore\Plugin\Data\CoreCharacter;
use PHPUnit\Framework\TestCase;

class DataInterfaceTest extends TestCase
{
    public function testConstruct()
    {
        $this->expectExceptionMessage('Method Neucore\Plugin\Core\DataInterface::__construct() does not exist');
        new \ReflectionMethod(DataInterface::class, '__construct');
    }

    public function testGetCharacterIdsByCorporation()
    {
        $method = new \ReflectionMethod(DataInterface::class, 'getCharacterIdsByCorporation');
        $this->assertSame('array', $method->getReturnType()->getName());
        $this->assertTrue($method->getReturnType()->allowsNull());

        $params = $method->getParameters();
        $this->assertSame(1, count($params));
        $this->assertSame('int', $params[0]->getType()->getName());
    }

    public function testGetCharactersByCorporation()
    {
        $method = new \ReflectionMethod(DataInterface::class, 'getCharactersByCorporation');
        $this->assertSame('array', $method->getReturnType()->getName());
        $this->assertTrue($method->getReturnType()->allowsNull());

        $params = $method->getParameters();
        $this->assertSame(1, count($params));
        $this->assertSame('int', $params[0]->getType()->getName());
    }

    public function testGetMemberTracking()
    {
        $method = new \ReflectionMethod(DataInterface::class, 'getMemberTracking');
        $this->assertSame('array', $method->getReturnType()->getName());
        $this->assertTrue($method->getReturnType()->allowsNull());

        $params = $method->getParameters();
        $this->assertSame(1, count($params));
        $this->assertSame('int', $params[0]->getType()->getName());
    }

    public function testGetCharacter()
    {
        $method = new \ReflectionMethod(DataInterface::class, 'getCharacter');
        $this->assertSame(CoreCharacter::class, $method->getReturnType()->getName());
        $this->assertTrue($method->getReturnType()->allowsNull());

        $params = $method->getParameters();
        $this->assertSame(1, count($params));
        $this->assertSame('int', $params[0]->getType()->getName());
    }

    public function testGetCharacterTokens()
    {
        $method = new \ReflectionMethod(DataInterface::class, 'getCharacterTokens');
        $this->assertSame('array', $method->getReturnType()->getName());
        $this->assertTrue($method->getReturnType()->allowsNull());

        $params = $method->getParameters();
        $this->assertSame(1, count($params));
        $this->assertSame('int', $params[0]->getType()->getName());
    }

    public function testGetPlayerId()
    {
        $method = new \ReflectionMethod(DataInterface::class, 'getPlayerId');
        $this->assertSame('int', $method->getReturnType()->getName());
        $this->assertTrue($method->getReturnType()->allowsNull());

        $params = $method->getParameters();
        $this->assertSame(1, count($params));
        $this->assertSame('int', $params[0]->getType()->getName());
    }

    public function testGetEveLoginNames()
    {
        $method = new \ReflectionMethod(DataInterface::class, 'getEveLoginNames');
        $this->assertSame('array', $method->getReturnType()->getName());
        $this->assertFalse($method->getReturnType()->allowsNull());

        $params = $method->getParameters();
        $this->assertSame(0, count($params));
    }

    public function testGetLoginTokens()
    {
        $method = new \ReflectionMethod(DataInterface::class, 'getLoginTokens');
        $this->assertSame('array', $method->getReturnType()->getName());
        $this->assertTrue($method->getReturnType()->allowsNull());

        $params = $method->getParameters();
        $this->assertSame(1, count($params));
        $this->assertSame('string', $params[0]->getType()->getName());
    }

    public function testGetGroups()
    {
        $method = new \ReflectionMethod(DataInterface::class, 'getGroups');
        $this->assertSame('array', $method->getReturnType()->getName());
        $this->assertFalse($method->getReturnType()->allowsNull());

        $params = $method->getParameters();
        $this->assertSame(0, count($params));
    }

    public function testGetCorporationGroups()
    {
        $method = new \ReflectionMethod(DataInterface::class, 'getCorporationGroups');
        $this->assertSame('array', $method->getReturnType()->getName());
        $this->assertTrue($method->getReturnType()->allowsNull());

        $params = $method->getParameters();
        $this->assertSame(1, count($params));
        $this->assertSame('int', $params[0]->getType()->getName());
    }

    public function testGetAllianceGroups()
    {
        $method = new \ReflectionMethod(DataInterface::class, 'getAllianceGroups');
        $this->assertSame('array', $method->getReturnType()->getName());
        $this->assertTrue($method->getReturnType()->allowsNull());

        $params = $method->getParameters();
        $this->assertSame(1, count($params));
        $this->assertSame('int', $params[0]->getType()->getName());
    }
}
