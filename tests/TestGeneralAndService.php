<?php

declare(strict_types=1);

namespace Tests;

use Neucore\Plugin\Core\OutputInterface;
use Neucore\Plugin\Data\CoreAccount;
use Neucore\Plugin\Data\CoreCharacter;
use Neucore\Plugin\Core\FactoryInterface;
use Neucore\Plugin\GeneralInterface;
use Neucore\Plugin\Data\ServiceAccountData;
use Neucore\Plugin\Data\PluginConfiguration;
use Neucore\Plugin\ServiceInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Log\LoggerInterface;

class TestGeneralAndService implements GeneralInterface, ServiceInterface
{
    public function __construct(
        LoggerInterface $logger,
        PluginConfiguration $pluginConfiguration,
        FactoryInterface $factory,
    ) {
    }

    public function onConfigurationChange(): void
    {
    }

    public function request(
        string $name,
        ServerRequestInterface $request,
        ResponseInterface $response,
        ?CoreAccount $coreAccount,
    ): ResponseInterface {
        return $response;
    }

    public function getNavigationItems(): array
    {
        return [];
    }

    public function command(array $arguments, array $options, OutputInterface $output): void
    {
    }

    public function getAccounts(array $characters): array
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

    public function updateAccount(CoreCharacter $character, array $groups, ?CoreCharacter $mainCharacter): void
    {
    }

    public function updatePlayerAccount(CoreCharacter $mainCharacter, array $groups): void
    {
    }

    public function moveServiceAccount(int $toPlayerId, int $fromPlayerId): bool
    {
        return true;
    }

    public function resetPassword(int $characterId): string
    {
        return '123';
    }

    public function getAllAccounts(): array
    {
        return [100];
    }

    public function getAllPlayerAccounts(): array
    {
        return [1];
    }

    public function search(string $query): array
    {
        return [new ServiceAccountData(100, 'username', null, null, null, 'Name')];
    }
}
