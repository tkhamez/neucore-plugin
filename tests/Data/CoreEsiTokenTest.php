<?php

declare(strict_types=1);

namespace Neucore\Plugin\Tests\Data;

use Neucore\Plugin\Data\CoreCharacter;
use Neucore\Plugin\Data\CoreEsiToken;
use PHPUnit\Framework\TestCase;

class CoreEsiTokenTest extends TestCase
{
    public function testConstruct()
    {
        $token = new CoreEsiToken(
            new CoreCharacter(100200300, 7),
            'test',
            ['esi-scope1', 'esi-scope2'],
            ['role1', 'role2'],
            true,
            new \DateTime(),
            false,
            new \DateTime(),
        );

        $this->assertSame(100200300, $token->character->id);
        $this->assertSame('test', $token->eveLoginName);
        $this->assertSame(['esi-scope1', 'esi-scope2'], $token->esiScopes);
        $this->assertSame(['role1', 'role2'], $token->eveRoles);
        $this->assertTrue($token->valid);
        $this->assertInstanceOf(\DateTime::class, $token->validStatusChanged);
        $this->assertFalse($token->hasRoles);
        $this->assertInstanceOf(\DateTime::class, $token->lastChecked);
    }
}
