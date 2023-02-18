<?php

declare(strict_types=1);

namespace Neucore\Plugin\Data;

class CoreEsiToken
{
    public function __construct(
        public ?CoreCharacter $character = null,

        public ?string $eveLoginName = null,

        /**
         * Required scopes of the login.
         *
         * @var string[]|null
         */
        public ?array $esiScopes = null,

        /**
         * Required in-game roles of the login.
         *
         * @var string[]|null
         */
        public ?array $eveRoles = null,

        /**
         * If the ESI token is valid or not.
         */
        public ?bool $valid = null,

        /**
         * When the "valid" status last changed.
         */
        public ?\DateTime $validStatusChanged = null,

        /**
         * If the character has the required in-game roles.
         */
        public ?bool $hasRoles = null,

        /**
         * When the token was last checked.
         */
        public ?\DateTime $lastChecked = null,
    ) {
    }
}
