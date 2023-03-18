<?php

declare(strict_types=1);

namespace Tests;

use Neucore\Plugin\Data\CoreCharacter;
use Neucore\Plugin\Data\PluginConfiguration;
use Neucore\Plugin\Data\ServiceAccountData;
use Neucore\Plugin\Exception;
use Neucore\Plugin\PluginInterface;
use Neucore\Plugin\ServiceInterface;
use PHPUnit\Framework\TestCase;

class ServiceInterfaceTest extends TestCase
{
    public function testConstruct()
    {
        $obj = new TestService(new TestLogger(), new PluginConfiguration(0, '', true, [], ''), new TestFactory());
        $this->assertInstanceOf(PluginInterface::class, $obj);
        $this->assertInstanceOf(ServiceInterface::class, $obj);
    }

    public function testConstants()
    {
        $this->assertSame('missing_email', ServiceInterface::ERROR_MISSING_EMAIL);
        $this->assertSame('email_mismatch', ServiceInterface::ERROR_EMAIL_MISMATCH);
        $this->assertSame('invite_wait', ServiceInterface::ERROR_INVITE_WAIT);
        $this->assertSame('account_not_found', ServiceInterface::ERROR_ACCOUNT_NOT_FOUND);
    }

    /**
     * @throws Exception
     */
    public function testGetAccounts()
    {
        $service = new TestService(new TestLogger(), new PluginConfiguration(0, '', true, [], ''), new TestFactory());
        $this->assertSame([], $service->getAccounts([]));
    }

    /**
     * @throws Exception
     */
    public function testRegister()
    {
        $service = new TestService(new TestLogger(), new PluginConfiguration(0, '', true, [], ''), new TestFactory());
        $this->assertInstanceOf(
            ServiceAccountData::class,
            $service->register(new CoreCharacter(10, 1), [], '', []));
    }

    /**
     * @throws Exception
     */
    public function testUpdateAccount()
    {
        $service = new TestService(new TestLogger(), new PluginConfiguration(0, '', true, [], ''), new TestFactory());
        /** @noinspection PhpVoidFunctionResultUsedInspection */
        $this->assertNull($service->updateAccount(new CoreCharacter(10, 1), [], new CoreCharacter(10, 1)));
    }

    /**
     * @throws Exception
     */
    public function testUpdatePlayerAccount()
    {
        $service = new TestService(new TestLogger(), new PluginConfiguration(0, '', true, [], ''), new TestFactory());
        /** @noinspection PhpVoidFunctionResultUsedInspection */
        $this->assertNull($service->updatePlayerAccount(new CoreCharacter(10, 1), []));
    }

    /**
     * @throws Exception
     */
    public function testMoveServiceAccount()
    {
        $service = new TestService(new TestLogger(), new PluginConfiguration(0, '', true, [], ''), new TestFactory());
        $this->assertTrue($service->moveServiceAccount(1, 2));
    }

    /**
     * @throws Exception
     */
    public function testResetPassword()
    {
        $service = new TestService(new TestLogger(), new PluginConfiguration(0, '', true, [], ''), new TestFactory());
        $this->assertSame('123', $service->resetPassword(1));
    }

    /**
     * @throws Exception
     */
    public function testGetAllAccounts()
    {
        $service = new TestService(new TestLogger(), new PluginConfiguration(0, '', true, [], ''), new TestFactory());
        $this->assertSame([100], $service->getAllAccounts());
    }

    /**
     * @throws Exception
     */
    public function testGetAllPlayerAccounts()
    {
        $service = new TestService(new TestLogger(), new PluginConfiguration(0, '', true, [], ''), new TestFactory());
        $this->assertSame([1], $service->getAllPlayerAccounts());
    }

    /**
     * @throws Exception
     */
    public function testSearch()
    {
        $service = new TestService(new TestLogger(), new PluginConfiguration(0, '', true, [], ''), new TestFactory());

        $result = $service->search('name');

        $this->assertSame(1, count($result));
        $this->assertInstanceOf(ServiceAccountData::class, $result[0]);
        $this->assertSame(100, $result[0]->getCharacterId());
        $this->assertSame('username', $result[0]->getUsername());
        $this->assertNull($result[0]->getPassword());
        $this->assertNull($result[0]->getEmail());
        $this->assertNull($result[0]->getStatus());
        $this->assertSame('Name', $result[0]->getName());
    }
}
