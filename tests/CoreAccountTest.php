<?php

declare(strict_types=1);

namespace Tests;

use Neucore\Plugin\CoreAccount;
use Neucore\Plugin\CoreCharacter;
use Neucore\Plugin\CoreGroup;
use Neucore\Plugin\CoreRole;
use PHPUnit\Framework\TestCase;

class CoreAccountTest extends TestCase
{
    public function testConstruct()
    {
        $account = new CoreAccount(
            new CoreCharacter(100, 1),
            [new CoreCharacter(200, 1)],
            [new CoreGroup(20, 'two')],
            [new CoreGroup(30, 'three')],
            [new CoreRole(4, 'four')]
        );

        $this->assertSame(100, $account->main->id);
        $this->assertSame(1, $account->main->playerId);

        $this->assertSame(200, $account->characters[0]->id);
        $this->assertSame(1, $account->characters[0]->playerId);

        $this->assertSame(20, $account->memberGroups[0]->identifier);
        $this->assertSame('two', $account->memberGroups[0]->name);

        $this->assertSame(30, $account->managerGroups[0]->identifier);
        $this->assertSame('three', $account->managerGroups[0]->name);

        $this->assertSame(4, $account->roles[0]->identifier);
        $this->assertSame('four', $account->roles[0]->name);
    }
}
