<?php

declare(strict_types=1);

namespace Neucore\Plugin\Data;

class NavigationItem implements \JsonSerializable
{
    public const PARENT_ROOT = 'root';

    public const PARENT_SERVICE = 'services';

    public const PARENT_MANAGEMENT = 'management';

    public const PARENT_ADMINISTRATION = 'administration';

    public  const PARENT_MEMBER_DATA = 'member_data';

    public function __construct(
        /**
         * One of the POSITION_* constants.
         */
        private string $parent,

        /**
         * Name of the menu item.
         */
        private string $name,

        /**
         * Relative URL after the plugin ID, e.g. /info for https://neucore.tld/plugin/1/info
         */
        private string $url,

        /**
         * Target attribute for the link.
         */
        private string $target = '_self',

        /**
         * Role a user must have (any one of them).
         *
         * @var string[]
         * @see CoreRole
         */
        private array $roles = [CoreRole::USER],
    ) {
    }

    public function jsonSerialize(): array
    {
        return [
            'parent' => $this->parent,
            'name' => $this->name,
            'url' => $this->url,
            'target' => $this->target,
            'roles' => $this->roles,
        ];
    }

    public function getParent(): string
    {
        return $this->parent;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function getTarget(): string
    {
        return $this->target;
    }

    /**
     * @return string[]
     */
    public function getRoles(): array
    {
        return $this->roles;
    }
}
