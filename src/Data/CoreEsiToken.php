<?php

declare(strict_types=1);

namespace Neucore\Plugin\Data;

class CoreEsiToken
{
    public function __construct(
        public CoreCharacter $character,

        public string $eveLoginName,

        /**
         * Required scopes of the login.
         *
         * @var string[]
         */
        public array $esiScopes,

        /**
         * Required in-game roles of the login.
         *
         * @var string[]
         */
        public array $eveRoles,

        /**
         * If the ESI token is valid or not.
         */
        public ?bool $valid = null,

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
