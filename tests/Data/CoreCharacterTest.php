<?php

declare(strict_types=1);

namespace Tests\Data;

use Neucore\Plugin\Data\CoreCharacter;
use PHPUnit\Framework\TestCase;

class CoreCharacterTest extends TestCase
{
    public function testConstruct()
    {
        $char1 = new CoreCharacter(200, 20);
        $this->assertSame(200, $char1->id);
        $this->assertSame(20, $char1->playerId);
        $this->assertNull($char1->main);
        $this->assertNull($char1->name);
        $this->assertNull($char1->ownerHash);
        $this->assertNull($char1->corporationId);
        $this->assertNull($char1->corporationName);
        $this->assertNull($char1->corporationTicker);
        $this->assertNull($char1->allianceId);
        $this->assertNull($char1->allianceName);
        $this->assertNull($char1->allianceTicker);

        $char2 = new CoreCharacter(100, 10, true, 'char', 'p', 'hash', 10, 'corp', 'ticker', 1, 'alli', 'a-tick');
        $this->assertSame(100, $char2->id);
        $this->assertSame(10, $char2->playerId);
        $this->assertTrue($char2->main);
        $this->assertSame('char', $char2->name);
        $this->assertSame('p', $char2->playerName);
        $this->assertSame('hash', $char2->ownerHash);
        $this->assertSame(10, $char2->corporationId);
        $this->assertSame('corp', $char2->corporationName);
        $this->assertSame('ticker', $char2->corporationTicker);
        $this->assertSame(1, $char2->allianceId);
        $this->assertSame('alli', $char2->allianceName);
        $this->assertSame('a-tick', $char2->allianceTicker);
    }
}
