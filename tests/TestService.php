<?php

declare(strict_types=1);

namespace Tests;

use Neucore\Plugin\CoreCharacter;
use Neucore\Plugin\ServiceAccountData;
use Neucore\Plugin\ServiceInterface;
use Psr\Log\LoggerInterface;

class TestService implements ServiceInterface
{
    public function __construct(LoggerInterface $logger, string $configurationData)
    {
    }

    public function getAccounts(array $characters, array $groups): array
    {
        return [];
    }

    public function register(
        CoreCharacter $character,
        array $groups,
        string $emailAddress,
        array $allCharacterIds
    ): ServiceAccountData {
        return new ServiceAccountData(1);
    }

    public function updateAccount(CoreCharacter $character, array $groups): void
    {
    }

    public function resetPassword(int $characterId): string
    {
        return '123';
    }

    public function getAllAccounts(): array
    {
        return [1];
    }
}
