[![build](https://github.com/tkhamez/neucore-plugin/workflows/test/badge.svg)](https://github.com/tkhamez/neucore-plugin/actions)

# neucore-plugin

Classes necessary to write a [Neucore](https://github.com/tkhamez/neucore) plugin.

Documentation can be found in the Neucore repository at 
https://github.com/tkhamez/neucore/blob/main/doc/Plugins.md.

For a list of plugins see https://github.com/tkhamez/neucore#plugins-and-other-related-software.

## Dev Env

```shell
docker build --tag neucore-plugin .
docker run -it --mount type=bind,source="$(pwd)",target=/app --workdir /app neucore-plugin /bin/sh
```

## Changelog

### next

- Added `Data\CoreEsiTokenTest` class
- Added `Data\CoreAccount::$playerId`
- Added `Data\CoreCharacter::$playerName`
- Added `Core\AccountInterface`
- Added `Core\DataInterface`
- Added `Core\FactoryInterface::getAccount()`
- Added `Core\FactoryInterface::getData()`

### 1.0.0 - 2023-02-11

- Breaking: Added `GeneralInterface::command()`.
- Added `PluginConfiguration::$active`.
- Added `NavigationItem::$roles`.

### 0.11.0 - 2023-01-15

- Added `CoreAccount::$groupsDeactivated`.
- Added `CoreAccount::getMemberGroups()`.

### 0.10.0 - 2023-01-06

This release adds (among others) a new "general" plugin type.

Breaking changes:

- Changed `ServiceInterface::__construct` signature.
- Changed `ServiceInterface::request` signature.
- Renamed `ServiceConfiguration` class to `PluginConfiguration` and moved to `Neucore\Plugin\Data` namespace.
- Added `ServiceInterface::search` method.
- Removed `ObjectProvider` (replaced by new `FactoryInterface` object provided in `ServiceConfiguration::__construct`).
- Moved `CoreCharacter`, `CoreGroup` and `ServiceAccountData` to `Neucore\Plugin\Data` namespace.

Other changes:

- Added plugin type "general".
- Added `GeneralInterface` for general (not service) plugins.
- Added `FactoryInterface`.
- Added `CoreAccount` and `CoreRole` classes.
- Removed "type" from plugin.yml (it's determined by the implemented interfaces).

### 0.9.2 - 2022-12-28

- Added plugin.yml.

### 0.9.1 - 2022-12-27

- Added `ObjectProvider::createHttpRequest` method.

### 0.9.0 - 2022-12-25

- Added `ServiceInterface::onConfigurationChange()`.
- Added `ObjectProvider` class with `getHttpClient` and `getSymfonyYamlParser` methods.
- Dropped PHP 7.4 support, minimum required version is now 8.0.
- Allow psr/log version 1.1, 2 or 3.

### 0.8.0 - 2022-06-19

- Raised minimum PHP version to 7.4.
- Added `ServiceInterface::moveServiceAccount()`.

### 0.7.1 - 2022-05-21

- If `ServiceAccountData::$name` cannot be json-encoded the class will return an error message instead.

### 0.7.0 - 2022-01-16

- Added `$groups` parameter to `ServiceInterface::request`

### 0.6.0 - 2022-01-01

- Renamed `ServiceAccountData::displayName` to `name`

### 0.5.0 - 2021-09-17

- Added `$playerId` property to `CoreCharacter`.
- Added `STATUS_NONMEMBER` to `ServiceAccountData`.
- Added `ServiceConfiguration` class.
- Replaced `$configurationData` with `ServiceConfiguration` object in `ServiceInterface` constructor.
- Removed `$groups` parameter from `ServiceInterface::getAccounts()`
- Added `$mainCharacter` parameter to `ServiceInterface::updateAccount()`.
- Added `ServiceInterface::updatePlayerAccount()`.
- Added `ServiceInterface::getAllPlayerAccounts()`.
- Added `ServiceInterface::request()`.

### 0.4.0 - 2021-09-04

- Added `$displayName` to `ServiceAccountData`.

### 0.3.0 - 2021-09-03

- Added `$configurationData` argument to the `ServiceInterface` constructor.

### 0.2.0 - 2021-01-29

- Added `ServiceInterface::getAllAccounts`

### 0.1.1 - 2021-01-08

- Require json extension in composer.json

### 0.1.0 - 2021-01-06

- Initial release
