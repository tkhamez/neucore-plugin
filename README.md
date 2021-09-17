# neucore-plugin

Classes necessary to write a [Neucore](https://github.com/tkhamez/neucore) plugin.


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
