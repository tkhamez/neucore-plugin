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

    public function getPlayerId(int $characterId): ?int
    {
    }
}
