<?php

/** @noinspection PhpInconsistentReturnPointsInspection */

declare(strict_types=1);

namespace Tests\Core;

use Neucore\Plugin\Core\AccountInterface;
use Neucore\Plugin\Data\CoreAccount;
use Neucore\Plugin\Data\CoreCharacter;

class TestAccount implements AccountInterface
{
    public function getAccount(int $playerId): ?CoreAccount
    {
    }

    public function getMain(int $playerId): ?CoreCharacter
    {
    }

    public function getCharacters(int $playerId): array
    {
    }

    public function getMemberGroups(int $playerId): array
    {
    }

    public function groupsDeactivated(int $playerId): bool
    {
    }

    public function getManagerGroups(int $playerId): array
    {
    }

    public function getRoles(int $playerId): array
    {
    }
}
