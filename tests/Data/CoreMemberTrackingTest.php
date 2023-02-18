<?php

declare(strict_types=1);

namespace Tests\Data;

use Neucore\Plugin\Data\CoreCharacter;
use Neucore\Plugin\Data\CoreEsiToken;
use Neucore\Plugin\Data\CoreMemberTracking;
use PHPUnit\Framework\TestCase;

class CoreMemberTrackingTest extends TestCase
{
    public function testConstruct()
    {
        $group = new CoreMemberTracking(
            new CoreCharacter(20, 1, false, 'char', 'player'),
            new CoreEsiToken(valid: true, validStatusChanged: new \DateTime(), lastChecked: new \DateTime()),
            new \DateTime(),
            new \DateTime(),
            3,
            'loc',
            'station',
            4,
            'ship',
            new \DateTime(),
        );
        $this->assertSame(20, $group->character->id);
        $this->assertTrue($group->defaultToken->valid);
        $this->assertInstanceOf(\DateTime::class, $group->logonDate);
        $this->assertInstanceOf(\DateTime::class, $group->logoffDate);
        $this->assertSame(3, $group->locationId);
        $this->assertSame('loc', $group->locationName);
        $this->assertSame('station', $group->locationCategory);
        $this->assertSame(4, $group->shipTypeId);
        $this->assertSame('ship', $group->shipTypeName);
        $this->assertInstanceOf(\DateTime::class, $group->joinDate);

        $group2 = new CoreMemberTracking(
            new CoreCharacter(20, 1, false, 'char', 'player'),
            null,
            new \DateTime(),
            new \DateTime(),
            3,
            'loc',
            'station',
            4,
            'ship',
            new \DateTime(),
        );
        $this->assertSame(20, $group2->character->id);
        $this->assertNull($group2->defaultToken);
    }
}
