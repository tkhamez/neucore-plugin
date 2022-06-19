# neucore-plugin

Classes necessary to write a [Neucore](https://github.com/tkhamez/neucore) service plugin.

Plugins implement the `ServiceInterface` class, for example 
[Discord Plugin](https://github.com/tkhamez/neucore-discord-plugin).

## Use

```shell
composer require tkhamez/neucore-plugin
```

Note: You can only use classes loaded by Neucore, this includes classes from the service plugin 
configuration namespace.

You should not use classes from the Neucore namespace, because they can change without notice. Except of course 
classes from this package, from the Neucore\Plugin namespace.

If you use other libraries that are available through Neucore, e.g. the Guzzle HTTP client, you should note that 
these can be updated with a new Neucore version.

## Run tests

```shell
vendor/bin/phpunit --bootstrap vendor/autoload.php tests
```

## Changelog

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

- Added $playerId property to CoreCharacter.
- Added STATUS_NONMEMBER to ServiceAccountData.
- Added ServiceConfiguration class.
- Replaced $configurationData with ServiceConfiguration object in ServiceInterface constructor.
- Removed $groups parameter from ServiceInterface::getAccounts()
- Added $mainCharacter parameter to ServiceInterface::updateAccount().
- Added ServiceInterface::updatePlayerAccount().
- Added ServiceInterface::getAllPlayerAccounts().
- Added ServiceInterface::request().

0.4.0 - 2021-09-04
- Added $displayName to ServiceAccountData.

0.3.0 - 2021-09-03
- Added $configurationData argument to the ServiceInterface constructor.

0.2.0 - 2021-01-29
- Added ServiceInterface::getAllAccounts

0.1.1 - 2021-01-08
- Require json extension in composer.json

0.1.0 - 2021-01-06
- Initial release
