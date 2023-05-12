# Sumtingwong

[![Latest Version on Packagist](https://img.shields.io/packagist/v/athphane/sumtingwong.svg?style=flat-square)](https://packagist.org/packages/athphane/sumtingwong)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/athphane/sumtingwong/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/athphane/sumtingwong/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/athphane/sumtingwong/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/athphane/sumtingwong/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/athphane/sumtingwong.svg?style=flat-square)](https://packagist.org/packages/athphane/sumtingwong)

Add functionality to your application so users can report errors and bugs they find while using the application.

Especially helpful in staging environments and during [UA testing](https://en.wikipedia.org/wiki/Acceptance_testing).

## Installation

You can install the package via composer:

```bash
composer require athphane/sumtingwong
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --tag="sumtingwong-migrations"
php artisan migrate
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="sumtingwong-config"
```

This is the contents of the published config file:

```php
return [
];
```

Optionally, you can publish the views using

```bash
php artisan vendor:publish --tag="sumtingwong-views"
```

## Usage

```php
$sumtingwong = new Athphane\Sumtingwong();
echo $sumtingwong->echoPhrase('Hello, Athphane!');
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Athfan Khaleel](https://github.com/athphane)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
