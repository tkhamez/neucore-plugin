<?php

declare(strict_types=1);

namespace Neucore\Plugin\Data;

class CoreCharacter
{
    public function __construct(

        /**
         * EVE character ID.
         */
        public int $id,

        /**
         * Neucore player (account) ID.
         *
         * Will be 0 if the character does not exist in the database.
         */
        public int $playerId,

        /**
         * Neucore main character.
         */
        public ?bool $main = null,

        /**
         * EVE character name.
         */
        public ?string $name = null,

        /**
         * Player name = name of the main character.
         */
        public ?string $playerName = null,

        /**
         * Character owner hash.
         */
        public ?string $ownerHash = null,

        /**
         * EVE corporation ID.
         */
        public ?int $corporationId = null,

        /**
         * EVE corporation name.
         */
        public ?string $corporationName = null,

        /**
         * EVE corporation ticker.
         */
        public ?string $corporationTicker = null,

        /**
         * EVE alliance ID.
         */
        public ?int $allianceId = null,

        /**
         * EVE alliance name.
         */
        public ?string $allianceName = null,

        /**
         * EVE alliance ticker.
         */
        public ?string $allianceTicker = null,
    ) {
    }
}
