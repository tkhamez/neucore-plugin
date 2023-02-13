<?php

/** @noinspection PhpUnhandledExceptionInspection */

declare(strict_types=1);

namespace Tests\Core;

use Neucore\Plugin\Data\CoreAccount;
use Neucore\Plugin\Data\CoreCharacter;
use PHPUnit\Framework\TestCase;

class AccountInterfaceTest extends TestCase
{
    public function testConstruct()
    {
        $this->expectExceptionMessage('Method Tests\Core\TestAccount::__construct() does not exist');
        new \ReflectionMethod(new TestAccount(), '__construct');
    }

    public function testGetAccount()
    {
        $method = new \ReflectionMethod(new TestAccount(), 'getAccount');
        $this->assertSame(CoreAccount::class, $method->getReturnType()->getName());
        $this->assertTrue($method->getReturnType()->allowsNull());

        $params = $method->getParameters();
        $this->assertSame(1, count($params));
        $this->assertSame('int', $params[0]->getType()->getName());
    }

    public function testGetMain()
    {
        $method = new \ReflectionMethod(new TestAccount(), 'getMain');
        $this->assertSame(CoreCharacter::class, $method->getReturnType()->getName());
        $this->assertTrue($method->getReturnType()->allowsNull());

        $params = $method->getParameters();
        $this->assertSame(1, count($params));
        $this->assertSame('int', $params[0]->getType()->getName());
    }

    public function testGetCharacters()
    {
        $method = new \ReflectionMethod(new TestAccount(), 'getCharacters');
        $this->assertSame('array', $method->getReturnType()->getName());
        $this->assertFalse($method->getReturnType()->allowsNull());

        $params = $method->getParameters();
        $this->assertSame(1, count($params));
        $this->assertSame('int', $params[0]->getType()->getName());
    }

    public function testGetMemberGroups()
    {
        $method = new \ReflectionMethod(new TestAccount(), 'getMemberGroups');
        $this->assertSame('array', $method->getReturnType()->getName());
        $this->assertFalse($method->getReturnType()->allowsNull());

        $params = $method->getParameters();
        $this->assertSame(1, count($params));
        $this->assertSame('int', $params[0]->getType()->getName());
    }

    public function testGroupsDeactivated()
    {
        $method = new \ReflectionMethod(new TestAccount(), 'groupsDeactivated');
        $this->assertSame('bool', $method->getReturnType()->getName());
        $this->assertFalse($method->getReturnType()->allowsNull());

        $params = $method->getParameters();
        $this->assertSame(1, count($params));
        $this->assertSame('int', $params[0]->getType()->getName());
    }

    public function testGetManagerGroups()
    {
        $method = new \ReflectionMethod(new TestAccount(), 'getManagerGroups');
        $this->assertSame('array', $method->getReturnType()->getName());
        $this->assertFalse($method->getReturnType()->allowsNull());

        $params = $method->getParameters();
        $this->assertSame(1, count($params));
        $this->assertSame('int', $params[0]->getType()->getName());
    }

    public function testGetRoles()
    {
        $method = new \ReflectionMethod(new TestAccount(), 'getRoles');
        $this->assertSame('array', $method->getReturnType()->getName());
        $this->assertFalse($method->getReturnType()->allowsNull());

        $params = $method->getParameters();
        $this->assertSame(1, count($params));
        $this->assertSame('int', $params[0]->getType()->getName());
    }
}
