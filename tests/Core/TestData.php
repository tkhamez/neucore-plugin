<?php

/** @noinspection PhpInconsistentReturnPointsInspection */

declare(strict_types=1);

namespace Tests\Core;

use Neucore\Plugin\Core\DataInterface;
use Neucore\Plugin\Data\CoreCharacter;

class TestData implements DataInterface
{
    public function getCharacter(int $characterId): ?CoreCharacter
    {
    }

    public function getCharacterTokens(int $characterId): array
    {
    }

    public function getPlayerId(int $characterId): ?int
    {
    }

    public function getEveLoginNames(): array
    {
    }

    public function getLoginTokens(string $eveLoginName): array
    {
    }
}
