<?php

declare(strict_types=1);

namespace Neucore\Plugin\Tests;

use Neucore\Plugin\Data\CoreAccount;
use Neucore\Plugin\Data\CoreCharacter;
use Neucore\Plugin\Data\PluginConfiguration;
use Neucore\Plugin\Exception;
use Neucore\Plugin\GeneralInterface;
use Neucore\Plugin\PluginInterface;
use Neucore\Plugin\ServiceInterface;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ResponseInterface;

class GeneralAndServiceInterfaceTest extends TestCase
{
    public function testConstruct()
    {
        $obj = new TestGeneralAndService(
            new TestLogger(),
            new PluginConfiguration(0, '', true, [], ''),
            new TestFactory(),
        );
        $this->assertInstanceOf(PluginInterface::class, $obj);
        $this->assertInstanceOf(GeneralInterface::class, $obj);
        $this->assertInstanceOf(ServiceInterface::class, $obj);
    }

    /**
     * @throws Exception
     */
    public function testOnConfigurationChange()
    {
        $service = new TestGeneralAndService(
            new TestLogger(),
            new PluginConfiguration(0, '', true, [], ''),
            new TestFactory(),
        );
        /** @noinspection PhpVoidFunctionResultUsedInspection */
        $this->assertNull($service->onConfigurationChange());
    }

    /**
     * @throws Exception
     */
    public function testRequest()
    {
        $service = new TestGeneralAndService(
            new TestLogger(),
            new PluginConfiguration(0, '', true, [], ''),
            new TestFactory(),
        );
        $this->assertInstanceOf(
            ResponseInterface::class,
            $service->request(
                'name',
                new TestRequest(),
                new TestResponse(),
                new CoreAccount(1, 'p', new CoreCharacter(100, 1), [], [], [], []),
            )
        );
    }
}
