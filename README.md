# ORTC-PHP

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Coverage Status][ico-scrutinizer]][link-scrutinizer]
[![Quality Score][ico-code-quality]][link-code-quality]
[![Total Downloads][ico-downloads]][link-downloads]

A modern PHP client for ORTC (Open Real-Time Connectivity, realtime & cloud-based pub/sub framework from realtime.co for PHP 5.4+).

## Install

Via Composer

``` bash
$ composer require ninjacto/ortc-php
```

## Usage

``` php
$ortcConfig = new OrtcConfig();
$ortcConfig->setApplicationKey('YOUR_APPLICATION_KEY');
$ortcConfig->setPrivateKey('YOUR_PRIVATE_KEY');
$ortcConfig->setVerifySsl(false);
$url = 'http://ortc-developers.realtime.co/server/2.1'; // ORTC server URL
$authToken = 'YOUR_AUTHENTICATION_TOKEN';
$channels = [];
$testChannel = new Channel();
$testChannel->setName('CHANNEL_NAME');
$testChannel->setPermission(Channel::PERMISSION_READ);
$channels[] = $testChannel;
$ortc = new Ortc($ortcConfig);
$authRequest = new AuthRequest();
$authRequest->setAuthToken($authToken);
$authRequest->setExpireTime(61);
$authRequest->setPrivate(true);
$authRequest->setChannels($channels);
$authResponse = $ortc->authenticate($authRequest);
```

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Testing

``` bash
$ composer test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) and [CONDUCT](CONDUCT.md) for details.

## Security

If you discover any security related issues, please email ramin.farmani@gmail.com instead of using the issue tracker.

## Credits

- [Ramin Farmani][link-author]
- [All Contributors][link-contributors]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/ninjacto/ortc-php.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/ninjacto/ortc-php/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/ninjacto/ortc-php.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/ninjacto/ortc-php.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/ninjacto/ortc-php.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/ninjacto/ortc-php
[link-travis]: https://travis-ci.org/ninjacto/ortc-php
[link-scrutinizer]: https://scrutinizer-ci.com/g/ninjacto/ortc-php/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/ninjacto/ortc-php
[link-downloads]: https://packagist.org/packages/ninjacto/ortc-php
[link-author]: https://github.com/ninjacto
[link-contributors]: ../../contributors
