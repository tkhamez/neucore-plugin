[![build](https://github.com/tkhamez/neucore-plugin/workflows/test/badge.svg)](https://github.com/tkhamez/neucore-plugin/actions)

# neucore-plugin

Classes necessary to write a [Neucore](https://github.com/tkhamez/neucore) service plugin.

Plugins implement the `ServiceInterface` class, for example 
[Discord Plugin](https://github.com/tkhamez/neucore-discord-plugin).

## Use

```shell
composer require tkhamez/neucore-plugin
```

Neucore automatically loads all classes from the namespace that is configured with the
"PSR-4 Prefix" configuration option and from this package, the `Neucore\Plugin` namespace.

Besides that, **do not use** any class from Neucore or any library that Neucore provides. Those can change or
be removed without notice. 

Also note that libraries from objects provided by the `ObjectProvider` can be updated with a new Neucore version.

## Dev Env

```shell
docker build --tag neucore-plugin .
docker run -it --mount type=bind,source="$(pwd)",target=/app --workdir /app neucore-plugin /bin/sh
```

## Changelog

0.9.0 - 2022-12-25

- Added `ServiceInterface::onConfigurationChange()`.
- Added `ObjectProvider` class with `getHttpClient` and `getSymfonyYamlParser` methods.
- Dropped PHP 7.4 support, minimum required version is now 8.0.
- Allow psr/log version 1.1, 2 or 3.

0.8.0 - 2022-06-19

- Raised minimum PHP version to 7.4.
- Added `ServiceInterface::moveServiceAccount()`.

0.7.1 - 2022-05-21

- If `ServiceAccountData::$name` cannot be json-encoded the class will return an error message instead.

0.7.0 - 2022-01-16

- Added `$groups` parameter to `ServiceInterface::request`

0.6.0 - 2022-01-01

- Renamed `ServiceAccountData::displayName` to `name`

0.5.0 - 2021-09-17

- Added `$playerId` property to `CoreCharacter`.
- Added `STATUS_NONMEMBER` to `ServiceAccountData`.
- Added `ServiceConfiguration` class.
- Replaced `$configurationData` with `ServiceConfiguration` object in `ServiceInterface` constructor.
- Removed `$groups` parameter from `ServiceInterface::getAccounts()`
- Added `$mainCharacter` parameter to `ServiceInterface::updateAccount()`.
- Added `ServiceInterface::updatePlayerAccount()`.
- Added `ServiceInterface::getAllPlayerAccounts()`.
- Added `ServiceInterface::request()`.

0.4.0 - 2021-09-04
- Added `$displayName` to `ServiceAccountData`.

0.3.0 - 2021-09-03
- Added `$configurationData` argument to the `ServiceInterface` constructor.

0.2.0 - 2021-01-29
- Added `ServiceInterface::getAllAccounts`

0.1.1 - 2021-01-08
- Require json extension in composer.json

0.1.0 - 2021-01-06
- Initial release
