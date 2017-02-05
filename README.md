# Token Management based Redis
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg)](LICENSE)
[![Build Status](https://travis-ci.org/wudege/token-assistant.svg?branch=master)](https://travis-ci.org/wudege/token-assistant)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/wudege/token-assistant/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/wudege/token-assistant/?branch=master)
[![Coverage Status](https://coveralls.io/repos/github/wudege/token-assistant/badge.svg?branch=master)](https://coveralls.io/github/wudege/token-assistant?branch=master)
[![Latest Stable Version](https://img.shields.io/packagist/v/wudege/token-assistant.svg)](https://packagist.org/packages/wudege/token-assistant)
[![Total Downloads](https://img.shields.io/packagist/dt/wudege/token-assistant.svg)](https://packagist.org/packages/wudege/token-assistant)
[![Twitter URL](https://img.shields.io/twitter/url/http/shields.io.svg?style=social&style=flat-square)](https://twitter.com/wudege)

## INSTALL

* Use the composer command or the composer.json file. That's the recommend way. And the SDK is here [`wudege/token-assistant`][install-packagist]
```bash
$ composer require wudege/token-assistant
```

## USAGE

```php

require __DIR__ . '/vendor/autoload.php';

$config = array(
    'host'     => '127.0.0.1',
    'port'     => 6379,
    'database' => 0,
);
$userId = 9527;

$client     = new \Predis\Client($config);
$dispatcher = new \TokenAssistant\TokenDispatcher($client);
$token      = $dispatcher->assign($userId);

```

## TEST

``` bash
$ ./vendor/bin/phpunit tests/TokenAssistant/Tests
```

## LICENSE

The MIT License (MIT). [License File](https://github.com/wudege/token-assistant/blob/master/LICENSE).

[packagist]: http://packagist.org
[install-packagist]: https://packagist.org/packages/wudege/token-assistant
