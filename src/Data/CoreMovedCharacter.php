<?php

declare(strict_types=1);

namespace Neucore\Plugin\Data;

class CoreMovedCharacter
{
    public const REASON_MOVED = 'moved';

    public const REASON_MOVED_OWNER_CHANGED = 'moved-owner-changed';

    public const REASON_DELETED_BIOMASSED = 'deleted-biomassed';

    public const REASON_DELETED_OWNER_CHANGED = 'deleted-owner-changed';

    public const REASON_DELETED_LOST_ACCESS = 'deleted-lost-access';

    public const REASON_DELETED_MANUALLY = 'deleted-manually';

    public const REASON_DELETED_BY_ADMIN = 'deleted-by-admin';

    public function __construct(
        public CoreAccount $oldPlayer,
        public ?CoreAccount $newPlayer,
        public CoreCharacter $character,
        public \DateTime $date,
        public string $reason,
        public ?CoreAccount $deletedBy,
    ) {
    }
}
