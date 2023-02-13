<?php

declare(strict_types=1);

namespace Neucore\Plugin\Core;

use Neucore\Plugin\Data\CoreCharacter;

interface DataInterface
{
    public function getCharacter(int $characterId): ?CoreCharacter;

    public function getPlayerId(int $characterId): ?int;
}
