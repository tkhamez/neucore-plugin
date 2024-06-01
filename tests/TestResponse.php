<?php

declare(strict_types=1);

namespace Tests;

use Psr\Http\Message\MessageInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamInterface;

class TestResponse implements ResponseInterface
{

    public function getProtocolVersion(): string
    {
    }

    public function withProtocolVersion($version): MessageInterface
    {
    }

    public function getHeaders(): array
    {
    }

    public function hasHeader($name): bool
    {
    }

    public function getHeader($name): array
    {
    }

    public function getHeaderLine($name): string
    {
    }

    public function withHeader($name, $value): MessageInterface
    {
    }

    public function withAddedHeader($name, $value): MessageInterface
    {
    }

    public function withoutHeader($name): MessageInterface
    {
    }

    public function getBody(): StreamInterface
    {
    }

    public function withBody(StreamInterface $body): MessageInterface
    {
    }

    public function getStatusCode(): int
    {
    }

    public function withStatus($code, $reasonPhrase = ''): ResponseInterface
    {
    }

    public function getReasonPhrase(): string
    {
    }
}