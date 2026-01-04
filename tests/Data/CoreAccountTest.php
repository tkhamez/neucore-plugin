<?php

declare(strict_types=1);

namespace Neucore\Plugin\Tests\Data;

use Neucore\Plugin\Data\CoreAccount;
use Neucore\Plugin\Data\CoreCharacter;
use Neucore\Plugin\Data\CoreGroup;
use Neucore\Plugin\Data\CoreRole;
use PHPUnit\Framework\TestCase;

class CoreAccountTest extends TestCase
{
    public function testConstructMinimum()
    {
        $account = new CoreAccount(1, 'p');
        $this->assertSame(1, $account->playerId);
        $this->assertSame('p', $account->playerName);
        $this->assertNull($account->main);
        $this->assertNull($account->characters);
        $this->assertNull($account->memberGroups);
        $this->assertNull($account->managerGroups);
        $this->assertNull($account->roles);
    }

    public function testConstruct()
    {
        $playerId = 1;
        $account = new CoreAccount(
            $playerId,
            'player name',
            new CoreCharacter(100, $playerId),
            [new CoreCharacter(200, $playerId)],
            [new CoreGroup(20, 'two')],
            [new CoreGroup(30, 'three')],
            [new CoreRole('four')],
        );

        $this->assertSame(1, $account->playerId);
        $this->assertSame('player name', $account->playerName);

        $this->assertSame(100, $account->main->id);
        $this->assertSame(1, $account->main->playerId);

        $this->assertSame(200, $account->characters[0]->id);
        $this->assertSame(1, $account->characters[0]->playerId);

        $this->assertSame(20, $account->memberGroups[0]->identifier);
        $this->assertSame('two', $account->memberGroups[0]->name);

        $this->assertFalse($account->groupsDeactivated);

        $this->assertSame(30, $account->managerGroups[0]->identifier);
        $this->assertSame('three', $account->managerGroups[0]->name);

        $this->assertSame('four', $account->roles[0]->name);
    }

    public function testGetMemberGroups()
    {
        $this->assertNull((new CoreAccount(1, 'p'))->getMemberGroups());

        $account = new CoreAccount(1, 'p', new CoreCharacter(100, 1), [], [new CoreGroup(20, 'two')], [], []);
        $this->assertSame(1, count($account->getMemberGroups()));

        $account->groupsDeactivated = true;
        $this->assertSame(0, count($account->getMemberGroups()));
    }
}
