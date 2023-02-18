<?php

declare(strict_types=1);

namespace Neucore\Plugin\Data;

class CoreMemberTracking
{
    public function __construct(
        public CoreCharacter $character,
        public ?CoreEsiToken $defaultToken,
        public \DateTime $logonDate,
        public \DateTime $logoffDate,
        public int $locationId,
        public string $locationName,
        public string $locationCategory,
        public int $shipTypeId,
        public string $shipTypeName,
        public \DateTime $joinDate,
    ) {
    }
}
