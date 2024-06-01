<?php

declare(strict_types=1);

namespace Tests;

use Psr\Http\Message\MessageInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\StreamInterface;
use Psr\Http\Message\UriInterface;

class TestRequest implements ServerRequestInterface
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

    public function getRequestTarget(): string
    {
    }

    public function withRequestTarget($requestTarget): \Psr\Http\Message\RequestInterface
    {
    }

    public function getMethod(): string
    {
    }

    public function withMethod($method): \Psr\Http\Message\RequestInterface
    {
    }

    public function getUri(): UriInterface
    {
    }

    public function withUri(UriInterface $uri, $preserveHost = false): \Psr\Http\Message\RequestInterface
    {
    }

    public function getServerParams(): array
    {
    }

    public function getCookieParams(): array
    {
    }

    public function withCookieParams(array $cookies): ServerRequestInterface
    {
    }

    public function getQueryParams(): array
    {
    }

    public function withQueryParams(array $query): ServerRequestInterface
    {
    }

    public function getUploadedFiles(): array
    {
    }

    public function withUploadedFiles(array $uploadedFiles): ServerRequestInterface
    {
    }

    public function getParsedBody()
    {
    }

    public function withParsedBody($data): ServerRequestInterface
    {
    }

    public function getAttributes(): array
    {
    }

    public function getAttribute($name, $default = null)
    {
    }

    public function withAttribute($name, $value): ServerRequestInterface
    {
    }

    public function withoutAttribute($name): ServerRequestInterface
    {
    }
}
