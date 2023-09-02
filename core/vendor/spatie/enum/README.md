# PHP Enum

[![Latest Version on Packagist](https://img.shields.io/packagist/v/spatie/enum.svg?style=for-the-badge)](https://packagist.org/packages/spatie/enum)
[![License](https://img.shields.io/github/license/spatie/enum?style=for-the-badge)](https://github.com/spatie/enum/blob/master/LICENSE.md)
![Postcardware](https://img.shields.io/badge/Postcardware-%F0%9F%92%8C-197593?style=for-the-badge)

[![PHP from Packagist](https://img.shields.io/packagist/php-v/spatie/enum?style=flat-square)](https://packagist.org/packages/spatie/enum)
[![Build Status](https://img.shields.io/github/workflow/status/spatie/enum/run-tests?label=tests&style=flat-square)](https://github.com/spatie/enum/actions?query=workflow%3Arun-tests)
[![Code Coverage](https://img.shields.io/coveralls/github/spatie/enum.svg?style=flat-square)](https://coveralls.io/github/spatie/enum)
[![Total Downloads](https://img.shields.io/packagist/dt/spatie/enum.svg?style=flat-square)](https://packagist.org/packages/spatie/enum)

This package offers strongly typed enums in PHP. In this package, enums are always objects, never constant values on their own. This allows for proper static analysis and refactoring in IDEs.

Here's how enums are created with this package:

```php
use \Spatie\Enum\Enum;

/**
 * @method static self draft()
 * @method static self published()
 * @method static self archived()
 */
class StatusEnum extends Enum
{
}
```

And this is how they are used:

```php
public function setStatus(StatusEnum $status): void
{
    $this->status = $status;
}

// ...

$class->setStatus(StatusEnum::draft());
```

## Support us

Learn how to create a package like this one, by watching our premium video course:

[![Laravel Package training](https://spatie.be/github/package-training.jpg)](https://laravelpackage.training)

We invest a lot of resources into creating [best in class open source packages](https://spatie.be/open-source). You can support us by [buying one of our paid products](https://spatie.be/open-source/support-us).

We highly appreciate you sending us a postcard from your hometown, mentioning which of our package(s) you are using. You'll find our address on [our contact page](https://spatie.be/about-us). We publish all received postcards on [our virtual postcard wall](https://spatie.be/open-source/postcards).

## Installation

You can install the package via composer:

```bash
composer require spatie/enum
```

## Usage

This is how an enum can be defined.

```php
/**
 * @method static self draft()
 * @method static self published()
 * @method static self archived()
 */
class StatusEnum extends Enum
{
}
```

This is how they are used:

```php
public function setStatus(StatusEnum $status)
{
    $this->status = $status;
}

// ...

$class->setStatus(StatusEnum::draft());
```

| Autocompletion  | Refactoring |
| ------------- | ------------- |
| ![](./docs/autocomplete.gif)  | ![](./docs/refactor.gif)  |

### Creating an enum from a value

```php
$status = new StatusEnum('draft');
```

When an enum value doesn't exist, you'll get an error. The only time you want to construct an enum from a value is when unserializing them from eg. a database.

If you want to get the value of an enum to store it, you can do this:

```php
$status->value;
```

Note that `value` is a read-only property, it cannot be changed.

### Enum values

By default, the enum value is its method name. You can however override it, for example if you want to store enums as integers in a database, instead of using their method name.

```php
/**
 * @method static self draft()
 * @method static self published()
 * @method static self archived()
 */
class StatusEnum extends Enum
{
    protected static function values(): array
    {
        return [
            'draft' => 1,
            'published' => 2,
            'archived' => 3,
        ];
    }
}
```

An enum value doesn't have to be a string, as you can see in the example.

### Enum labels

Enums can be given a label, you can do this by overriding the `labels` method.

```php
/**
 * @method static self draft()
 * @method static self published()
 * @method static self archived()
 */
class StatusEnum extends Enum
{
    protected static function labels(): array
    {
        return [
            'draft' => 'my draft label',
        ];
    }
}
```

You don't need to override all labels, the default label will be the enum's value. You can access an enum's label like so:

```php
$status->label;
```

Note that `label` is a read-only property, it cannot be changed.

### Comparing enums

Enums can be compared using the `equals` method:

```php
$status->equals(StatusEnum::draft());
```

You can pass several enums to the `equals` method, it will return `true` if the current enum equals one of the given values.

```php
$status->equals(StatusEnum::draft(), StatusEnum::archived());
```

### Testing

``` bash
composer test
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email freek@spatie.be instead of using the issue tracker.

## Postcardware

You're free to use this package, but if it makes it to your production environment we highly appreciate you sending us a postcard from your hometown, mentioning which of our package(s) you are using.

Our address is: Spatie, Kruikstraat 22, 2018 Antwerp, Belgium.

We publish all received postcards [on our company website](https://spatie.be/en/opensource/postcards).

## Credits

- [Brent Roose](https://github.com/brendt)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
