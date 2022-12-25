<?php

declare(strict_types=1);

namespace Tests;

use Neucore\Plugin\CoreCharacter;
use Neucore\Plugin\CoreGroup;
use Neucore\Plugin\Exception;
use Neucore\Plugin\ServiceAccountData;
use Neucore\Plugin\ServiceConfiguration;
use Neucore\Plugin\ServiceInterface;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ResponseInterface;

class ServiceInterfaceTest extends TestCase
{
    public function testConstants()
    {
        $this->assertSame('missing_email', ServiceInterface::ERROR_MISSING_EMAIL);
        $this->assertSame('email_mismatch', ServiceInterface::ERROR_EMAIL_MISMATCH);
        $this->assertSame('invite_wait', ServiceInterface::ERROR_INVITE_WAIT);
        $this->assertSame('account_not_found', ServiceInterface::ERROR_ACCOUNT_NOT_FOUND);
    }

    public function testConstruct()
    {
        $this->assertInstanceOf(
            ServiceInterface::class,
            new TestService(new TestLogger(), new ServiceConfiguration(0, [], ''))
        );
    }

    /**
     * @throws Exception
     */
    public function testGetAccounts()
    {
        $service = new TestService(new TestLogger(), new ServiceConfiguration(0, [], ''));
        $this->assertSame([], $service->getAccounts([]));
    }

    /**
     * @throws Exception
     */
    public function testRegister()
    {
        $service = new TestService(new TestLogger(), new ServiceConfiguration(0, [], ''));
        $this->assertInstanceOf(
            ServiceAccountData::class,
            $service->register(new CoreCharacter(10, 1), [], '', []));
    }

    /**
     * @throws Exception
     */
    public function testUpdateAccount()
    {
        $service = new TestService(new TestLogger(), new ServiceConfiguration(0, [], ''));
        /** @noinspection PhpVoidFunctionResultUsedInspection */
        $this->assertNull($service->updateAccount(new CoreCharacter(10, 1), [], new CoreCharacter(10, 1)));
    }

    /**
     * @throws Exception
     */
    public function testUpdatePlayerAccount()
    {
        $service = new TestService(new TestLogger(), new ServiceConfiguration(0, [], ''));
        /** @noinspection PhpVoidFunctionResultUsedInspection */
        $this->assertNull($service->updatePlayerAccount(new CoreCharacter(10, 1), []));
    }

    /**
     * @throws Exception
     */
    public function testMoveServiceAccount()
    {
        $service = new TestService(new TestLogger(), new ServiceConfiguration(0, [], ''));
        $this->assertTrue($service->moveServiceAccount(1, 2));
    }

    /**
     * @throws Exception
     */
    public function testResetPassword()
    {
        $service = new TestService(new TestLogger(), new ServiceConfiguration(0, [], ''));
        $this->assertSame('123', $service->resetPassword(1));
    }

    /**
     * @throws Exception
     */
    public function testGetAllAccounts()
    {
        $service = new TestService(new TestLogger(), new ServiceConfiguration(0, [], ''));
        $this->assertSame([100], $service->getAllAccounts());
    }

    /**
     * @throws Exception
     */
    public function testGetAllPlayerAccounts()
    {
        $service = new TestService(new TestLogger(), new ServiceConfiguration(0, [], ''));
        $this->assertSame([1], $service->getAllPlayerAccounts());
    }

    /**
     * @throws Exception
     */
    public function testRequest()
    {
        $service = new TestService(new TestLogger(), new ServiceConfiguration(0, [], ''));
        $this->assertInstanceOf(ResponseInterface::class, $service->request(
            new CoreCharacter(10, 1),
            'name',
            new TestRequest(),
            new TestResponse(),
            [new CoreGroup(1, 'group')]
        ));
    }
}
