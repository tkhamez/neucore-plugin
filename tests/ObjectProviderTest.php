<?php

declare(strict_types=1);

namespace Tests;

use GuzzleHttp\Client;
use Neucore\Plugin\ObjectProvider;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\RequestInterface;
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

    public function testCreateHttpRequest()
    {
        $this->assertInstanceOf(
            RequestInterface::class,
            ObjectProvider::createHttpRequest('GET', 'https://example.tdl', [], 'body')
        );
    }

    public function testGetYamlParser()
    {
        $this->assertInstanceOf(Parser::class, ObjectProvider::getSymfonyYamlParser());
    }
}
