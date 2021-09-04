# neucore-plugin

Necessary classes to write a [Neucore](https://github.com/tkhamez/neucore) plugin.

Use:
```shell
composer require tkhamez/neucore-plugin
```

Run tests:
```shell
vendor/bin/phpunit --bootstrap vendor/autoload.php tests
```

## Changelog

0.4.0 - 2021-09-04
- Add $displayName to ServiceAccountData.

0.3.0 - 2021-09-03
- Add $configurationData argument to the ServiceInterface constructor.

0.2.0 - 2021-01-29
- Add ServiceInterface::getAllAccounts

0.1.1 - 2021-01-08
- Require json extension in composer.json

0.1.0 - 2021-01-06
- Initial release
