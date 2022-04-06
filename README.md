# Nova Version Card (Laravel Nova 4.0+)

Get the versions of the basic system services of the server running your web application right from your Nova dashboard.  This is based on the work of [Chris Bautista](https://github.com/CoreProc/nova-system-info-card)

![version card screenshot](https://github.com/Kussie/nova-version-card/blob/main/screenshot.png?raw=true)

## Installation

You can install the package in to a Laravel app that uses [Nova](https://nova.laravel.com) via composer:

```bash
composer require kussie/nova-version-card
```

## Usage

Register the card within your Dashboard in Nova. This is typically done in the `cards` method of your Dashboard file for example `Dashboard/Main.php`.

```php
// ...
public function cards()
{
    return [
        // ...
        new \Kussie\VersionCard\VersionCard(),
    ];
}
```

### Testing

``` bash
composer test
```

### Security

If you discover any security related issues, please email ben@kussie.com.au instead of using the issue tracker.

## Credits

- [Chris Bautista](https://github.com/chrisbjr)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.