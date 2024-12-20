<?php

declare(strict_types=1);

namespace Neucore\Plugin\Data;

use JsonSerializable;

/**
 * Represents a service account.
 *
 * $characterId and either $username or $email must be set, $password and $status are optional.
 * If the account status is not provided it is considered to be active.
 * If a password is provided, it will be displayed to the user.
 */
class ServiceAccountData implements JsonSerializable
{
    const STATUS_PENDING = 'Pending';

    const STATUS_ACTIVE = 'Active';

    const STATUS_DEACTIVATED = 'Deactivated';

    const STATUS_NONMEMBER = 'Nonmember';

    const STATUS_UNKNOWN = 'Unknown';

    /**
     * EVE character ID.
     */
    private int $characterId;

    /**
     * Service account username.
     */
    private ?string $username;

    /**
     * Service account password.
     */
    private ?string $password;

    /**
     * Service account e-mail.
     */
    private ?string $email;

    /**
     * Service account status.
     */
    private ?string $status;

    /**
     * Service account name.
     */
    private ?string $name;

    public function __construct(
        int $characterId,
        ?string $username = null,
        ?string $password = null,
        ?string $email = null,
        ?string $status = null,
        ?string $name = null
    ) {
        $this->characterId = $characterId;
        $this->username = $username;
        $this->password = $password;
        $this->email = $email;
        $this->status = $status;
        $this->name = $name;
    }

    public function jsonSerialize(): array
    {
        return [
            'characterId' => $this->characterId,
            'username' => $this->username,
            'password' => $this->password,
            'email' => $this->email,
            'status' => $this->status,
            'name' => $this->getName(),
        ];
    }

    public function getCharacterId(): int
    {
        return $this->characterId;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;
        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;
        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;
        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    /**
     * @param string $status One of the self::STATUS_* constants. Invalid values are ignored.
     * @return self
     */
    public function setStatus(string $status): self
    {
        if (in_array($status,[
            self::STATUS_ACTIVE,
            self::STATUS_DEACTIVATED,
            self::STATUS_PENDING,
            self::STATUS_NONMEMBER,
            self::STATUS_UNKNOWN,
        ])) {
            $this->status = $status;
        }
        return $this;
    }

    public function getName(): ?string
    {
        // It seems that some characters cannot be used with json_encode on some systems.
        // It's better to fail here than to fail later along with other data.
        if (json_encode($this->name) === false) {
            return '(cannot json-encode name)';
        }

        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }
}
