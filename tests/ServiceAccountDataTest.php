<?php

declare(strict_types=1);

namespace Tests;

use Neucore\Plugin\ServiceAccountData;
use PHPUnit\Framework\TestCase;

class ServiceAccountDataTest extends TestCase
{
    public function testConstructJsonSerialize()
    {
        $this->assertSame([
            'characterId' => 1,
            'username' => null,
            'password' => null,
            'email' => null,
            'status' => null,
            'displayName' => null,
        ], (new ServiceAccountData(1))->jsonSerialize());

        $data = new ServiceAccountData(1, 'u', 'p', 'e', 's', 'dn');
        $this->assertSame([
            'characterId' => 1,
            'username' => 'u',
            'password' => 'p',
            'email' => 'e',
            'status' => 's',
            'displayName' => 'dn',
        ], $data->jsonSerialize());
    }

    public function testGetCharacterId()
    {
        $this->assertSame(1, (new ServiceAccountData(1))->getCharacterId());
    }

    public function testSetGetUsername()
    {
        $data = new ServiceAccountData(1);
        $this->assertSame('u', $data->setUsername('u')->getUsername());
    }

    public function testSetGetPassword()
    {
        $data = new ServiceAccountData(1);
        $this->assertSame('p', $data->setPassword('p')->getPassword());
    }

    public function testSetGetEmail()
    {
        $data = new ServiceAccountData(1);
        $this->assertSame('e', $data->setEmail('e')->getEmail());
    }

    public function testSetGetStatus()
    {
        $data = new ServiceAccountData(1);
        $this->assertSame(null, $data->setStatus('invalid')->getStatus());
        $this->assertSame(
            ServiceAccountData::STATUS_ACTIVE,
            $data->setStatus(ServiceAccountData::STATUS_ACTIVE)->getStatus()
        );
    }

    public function testSetGetDisplayName()
    {
        $data = new ServiceAccountData(1);
        $this->assertSame('dn', $data->setDisplayName('dn')->getDisplayName());
    }
}
