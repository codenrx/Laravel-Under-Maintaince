# Laravel Under Maintaince Package

[![issu Status](https://img.shields.io/github/issues/codenrx/Laravel-Under-Maintaince)](https://github.com/codenrx/Laravel-Under-Maintaince/issues)
[![Build Status](https://travis-ci.org/boennemann/badges.svg?branch=master)](https://github.com/codenrx/Laravel-Under-Maintaince/releases) ![folk Status](https://img.shields.io/github/forks/codenrx/Laravel-Under-Maintaince)
![contributions welcome](https://img.shields.io/badge/contributions-welcome-brightgreen.svg?style=flat)
[![Tweet](https://img.shields.io/twitter/url?url=https%3A%2F%2Fgithub.com%2Fcodenrx%2FLaravel-Under-Maintaince)](https://twitter.com/intent/tweet?text=I%20found%20a%20nice%20package%20for%20enable%20Under%20Construction%20or%20Under%20Maintaince%20mode%20.%20Please%20check%20:&url=https%3A%2F%2Fgithub.com%2Fcodenrx%2FLaravel-Under-Maintaince)

This Laravel package makes it possible for you to set your website in Under Construction or Under Maintaince  mode

# Install

```php 
composer require codenrx/maintaince
```

add these line in `providers` array of `config/app.php`

```php
codenrx\maintaince\maintainceServiceProvider::class,
```

then ,
use these command to publish package config file (maintaince.php) in `config` folder and template in `views\vendor\maintaince` folder .

```php
php artisan vendor:publish --provider="codenrx\maintaince\maintainceServiceProvider"
```

Open `app\Http\Kernel.php` & add these line into 

```php
protected $middleware = [
     .....................
     ..................
     \codenrx\maintaince\App\Http\Middleware\maintainceWare::class,
];
```

# Usage

use these command to enable maintaince mode

```php
php artisan make:maintaince on
```

You can also use these command to enable underconstruction mode

```php
php artisan make:maintaince underconstruction
```

Disable Maintaince Mode 

```php
php artisan make:maintaince off
```

# Customization

You can customize your template also .
You need to go `/resources/views/vendor/maintaince`.

**For Some Settings , You can check config file (maintaince.php) in `config` folder**

---

**Template Credits : ❤️ [Colorlib](https://colorlib.com)**

### For more Links

- [GitHub](https://github.com/IANirab)
- [Facebook](https://web.facebook.com/istiaq.nirab.1)
- [Medium](https://medium.com/@nirab)
- [Website](https://codenrx.com)

**Enjoy!**
