<?php

declare(strict_types=1);

namespace Tests\Core;

use Neucore\Plugin\Core\AccountInterface;
use Neucore\Plugin\Data\CoreAccount;
use Neucore\Plugin\Data\CoreCharacter;
use PHPUnit\Framework\TestCase;

class AccountInterfaceTest extends TestCase
{
    public function testConstruct()
    {
        $this->expectExceptionMessage('Method Neucore\Plugin\Core\AccountInterface::__construct() does not exist');
        new \ReflectionMethod(AccountInterface::class, '__construct');
    }

    public function testGetAccountsByGroup()
    {
        $method = new \ReflectionMethod(AccountInterface::class, 'getAccountsByGroup');
        $this->assertSame('array', $method->getReturnType()->getName());
        $this->assertTrue($method->getReturnType()->allowsNull());

        $params = $method->getParameters();
        $this->assertSame(1, count($params));
        $this->assertSame('int', $params[0]->getType()->getName());
    }

    public function testGetAccountsByGroupManager()
    {
        $method = new \ReflectionMethod(AccountInterface::class, 'getAccountsByGroupManager');
        $this->assertSame('array', $method->getReturnType()->getName());
        $this->assertTrue($method->getReturnType()->allowsNull());

        $params = $method->getParameters();
        $this->assertSame(1, count($params));
        $this->assertSame('int', $params[0]->getType()->getName());
    }

    public function testGetAccountsByRole()
    {
        $method = new \ReflectionMethod(AccountInterface::class, 'getAccountsByRole');
        $this->assertSame('array', $method->getReturnType()->getName());
        $this->assertTrue($method->getReturnType()->allowsNull());

        $params = $method->getParameters();
        $this->assertSame(1, count($params));
        $this->assertSame('string', $params[0]->getType()->getName());
    }

    public function testGetAccount()
    {
        $method = new \ReflectionMethod(AccountInterface::class, 'getAccount');
        $this->assertSame(CoreAccount::class, $method->getReturnType()->getName());
        $this->assertTrue($method->getReturnType()->allowsNull());

        $params = $method->getParameters();
        $this->assertSame(1, count($params));
        $this->assertSame('int', $params[0]->getType()->getName());
    }

    public function testGetMain()
    {
        $method = new \ReflectionMethod(AccountInterface::class, 'getMain');
        $this->assertSame(CoreCharacter::class, $method->getReturnType()->getName());
        $this->assertTrue($method->getReturnType()->allowsNull());

        $params = $method->getParameters();
        $this->assertSame(1, count($params));
        $this->assertSame('int', $params[0]->getType()->getName());
    }

    public function testGetCharacters()
    {
        $method = new \ReflectionMethod(AccountInterface::class, 'getCharacters');
        $this->assertSame('array', $method->getReturnType()->getName());
        $this->assertTrue($method->getReturnType()->allowsNull());

        $params = $method->getParameters();
        $this->assertSame(1, count($params));
        $this->assertSame('int', $params[0]->getType()->getName());
    }

    public function testGetMemberGroups()
    {
        $method = new \ReflectionMethod(AccountInterface::class, 'getMemberGroups');
        $this->assertSame('array', $method->getReturnType()->getName());
        $this->assertTrue($method->getReturnType()->allowsNull());

        $params = $method->getParameters();
        $this->assertSame(1, count($params));
        $this->assertSame('int', $params[0]->getType()->getName());
    }

    public function testGroupsDeactivated()
    {
        $method = new \ReflectionMethod(AccountInterface::class, 'groupsDeactivated');
        $this->assertSame('bool', $method->getReturnType()->getName());
        $this->assertTrue($method->getReturnType()->allowsNull());

        $params = $method->getParameters();
        $this->assertSame(1, count($params));
        $this->assertSame('int', $params[0]->getType()->getName());
    }

    public function testGetManagerGroups()
    {
        $method = new \ReflectionMethod(AccountInterface::class, 'getManagerGroups');
        $this->assertSame('array', $method->getReturnType()->getName());
        $this->assertTrue($method->getReturnType()->allowsNull());

        $params = $method->getParameters();
        $this->assertSame(1, count($params));
        $this->assertSame('int', $params[0]->getType()->getName());
    }

    public function testGetRoles()
    {
        $method = new \ReflectionMethod(AccountInterface::class, 'getRoles');
        $this->assertSame('array', $method->getReturnType()->getName());
        $this->assertTrue($method->getReturnType()->allowsNull());

        $params = $method->getParameters();
        $this->assertSame(1, count($params));
        $this->assertSame('int', $params[0]->getType()->getName());
    }
}
