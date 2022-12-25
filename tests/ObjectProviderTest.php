<?php

declare(strict_types=1);

namespace Tests;

use GuzzleHttp\Client;
use Neucore\Plugin\ObjectProvider;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Yaml\Parser;

class ObjectProviderTest extends TestCase
{
    public function testGetClient()
    {
        $this->assertInstanceOf(
            Client::class,
            ObjectProvider::getHttpClient('Neucore Plugin (https://github.com/tkhamez/neucore-plugin)')
        );
    }

    public function testGetYamlParser()
    {
        $this->assertInstanceOf(Parser::class, ObjectProvider::getSymfonyYamlParser());
    }
}
