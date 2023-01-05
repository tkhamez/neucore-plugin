<?php

declare(strict_types=1);

namespace Tests\Data;

use Neucore\Plugin\Data\ServiceAccountData;
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
            'name' => null,
        ], (new ServiceAccountData(1))->jsonSerialize());

        $data = new ServiceAccountData(1, 'u', 'p', 'e', 's', 'dn');
        $this->assertSame([
            'characterId' => 1,
            'username' => 'u',
            'password' => 'p',
            'email' => 'e',
            'status' => 's',
            'name' => 'dn',
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

    public function testSetGetName()
    {
        $data = new ServiceAccountData(1);
        $this->assertSame('dn', $data->setName('dn')->getName());
    }

    public function testGetNameInvalid()
    {
        $data = new ServiceAccountData(1);
        $this->assertSame('(cannot json-encode name)', $data->setName("1 \xA0 3")->getName());
    }
}
