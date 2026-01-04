<?php

declare(strict_types=1);

namespace Neucore\Plugin\Tests\Data;

use Neucore\Plugin\Data\CoreAccount;
use Neucore\Plugin\Data\CoreCharacter;
use Neucore\Plugin\Data\CoreMovedCharacter;
use PHPUnit\Framework\TestCase;

class CoreMovedCharacterTest extends TestCase
{
    public function testConstants()
    {
        $this->assertSame('moved', CoreMovedCharacter::REASON_MOVED);
        $this->assertSame('moved-owner-changed', CoreMovedCharacter::REASON_MOVED_OWNER_CHANGED);
        $this->assertSame('deleted-biomassed', CoreMovedCharacter::REASON_DELETED_BIOMASSED);
        $this->assertSame('deleted-owner-changed', CoreMovedCharacter::REASON_DELETED_OWNER_CHANGED);
        $this->assertSame('deleted-lost-access', CoreMovedCharacter::REASON_DELETED_LOST_ACCESS);
        $this->assertSame('deleted-manually', CoreMovedCharacter::REASON_DELETED_MANUALLY);
        $this->assertSame('deleted-by-admin', CoreMovedCharacter::REASON_DELETED_BY_ADMIN);
    }

    public function testConstruct()
    {
        $movedChar = new CoreMovedCharacter(
            new CoreAccount(1, 'p'),
            new CoreAccount(2, 'q'),
            new CoreCharacter(10, 1),
            new \DateTime(),
            'reason',
            new CoreAccount(3, 'r'),
        );
        $this->assertSame(1, $movedChar->oldPlayer->playerId);
        $this->assertSame(2, $movedChar->newPlayer->playerId);
        $this->assertSame(10, $movedChar->character->id);
        $this->assertSame('reason', $movedChar->reason);
        $this->assertInstanceOf(\DateTime::class, $movedChar->date);
        $this->assertSame(3, $movedChar->deletedBy->playerId);

        $movedChar2 = new CoreMovedCharacter(
            new CoreAccount(1, 'p'),
            null,
            new CoreCharacter(10, 1),
            new \DateTime(),
            'reason',
            null,
        );
        $this->assertSame(1, $movedChar2->oldPlayer->playerId);
        $this->assertNull($movedChar2->newPlayer);
        $this->assertSame(10, $movedChar2->character->id);
        $this->assertSame('reason', $movedChar2->reason);
        $this->assertInstanceOf(\DateTime::class, $movedChar2->date);
        $this->assertNull($movedChar2->deletedBy);
    }
}
