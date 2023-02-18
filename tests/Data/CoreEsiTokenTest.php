<?php

declare(strict_types=1);

namespace Tests\Data;

use Neucore\Plugin\Data\CoreCharacter;
use Neucore\Plugin\Data\CoreEsiToken;
use PHPUnit\Framework\TestCase;

class CoreEsiTokenTest extends TestCase
{
    public function testConstruct()
    {
        $token1 = new CoreEsiToken(
            new CoreCharacter(100200300, 7),
            'test',
            ['esi-scope1', 'esi-scope2'],
            ['role1', 'role2'],
        );

        $this->assertSame(100200300, $token1->character->id);
        $this->assertSame('test', $token1->eveLoginName);
        $this->assertSame(['esi-scope1', 'esi-scope2'], $token1->esiScopes);
        $this->assertSame(['role1', 'role2'], $token1->eveRoles);
        $this->assertNull($token1->valid);
        $this->assertNull($token1->hasRoles);
        $this->assertNull($token1->lastChecked);

        $token2 = new CoreEsiToken(
            new CoreCharacter(100200300, 7),
            'test',
            ['esi-scope1', 'esi-scope2'],
            ['role1', 'role2'],
            true,
            new \DateTime(),
            false,
            new \DateTime(),
        );

        $this->assertSame(100200300, $token2->character->id);
        $this->assertSame('test', $token2->eveLoginName);
        $this->assertSame(['esi-scope1', 'esi-scope2'], $token2->esiScopes);
        $this->assertSame(['role1', 'role2'], $token2->eveRoles);
        $this->assertTrue($token2->valid);
        $this->assertInstanceOf(\DateTime::class, $token2->validStatusChanged);
        $this->assertFalse($token2->hasRoles);
        $this->assertInstanceOf(\DateTime::class, $token2->lastChecked);
    }
}
