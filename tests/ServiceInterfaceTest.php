<?php

declare(strict_types=1);

namespace Tests;

use Neucore\Plugin\CoreCharacter;
use Neucore\Plugin\Exception;
use Neucore\Plugin\ServiceAccountData;
use Neucore\Plugin\ServiceInterface;
use PHPUnit\Framework\TestCase;
use Psr\Log\Test\TestLogger;

class ServiceInterfaceTest extends TestCase
{
    public function testConstruct()
    {
        $this->assertInstanceOf(ServiceInterface::class, new TestService(new TestLogger()));
    }

    /**
     * @throws Exception
     */
    public function testGetAccounts()
    {
        $service = new TestService(new TestLogger());
        $this->assertSame([], $service->getAccounts([], []));
    }

    /**
     * @throws Exception
     */
    public function testRegister()
    {
        $service = new TestService(new TestLogger());
        $this->assertInstanceOf(
            ServiceAccountData::class,
            $service->register(new CoreCharacter(1), [], '', []));
    }

    /**
     * @throws Exception
     */
    public function testUpdateAccount()
    {
        $service = new TestService(new TestLogger());
        /** @noinspection PhpVoidFunctionResultUsedInspection */
        $this->assertNull($service->updateAccount(new CoreCharacter(1), []));
    }

    /**
     * @throws Exception
     */
    public function testResetPassword()
    {
        $service = new TestService(new TestLogger());
        $this->assertSame('123', $service->resetPassword(1));
    }

    /**
     * @throws Exception
     */
    public function testGetAllAccounts()
    {
        $service = new TestService(new TestLogger());
        $this->assertSame([1], $service->getAllAccounts());
    }
}
