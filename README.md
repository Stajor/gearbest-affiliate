# PHP SMS Fetcher

![Minimal PHP version](https://img.shields.io/packagist/php-v/stajor/gearbest-affiliate.svg)
[![Build Status](https://api.travis-ci.org/Stajor/gearbest-affiliate.svg?branch=master)](https://travis-ci.org/Stajor/gearbest-affiliate)

This PHP library will help you to interactive with Gearbest Affiliate site.

## Installation

Add this line to your application's composer.json:

```json
{
    "require": {
        "stajor/gearbest-affiliate": "^1.0"
    }
}
```
and run `composer update`

**Or** run this command in your command line:

    $ composer require stajor/gearbest-affiliate
    
## Usage

```php
<?php

\GearBest\Request::login([email], [password]);

$affiliate = new \GearBest\Affiliate();
$coupons = $affiliate->coupons([affiliate_id], ['pagesize' => 10, 'site_id' => 'en']);

```



## Contributing

Bug reports and pull requests are welcome on GitHub at https://github.com/Stajor/gearbest-affiliate. This project is intended to be a safe, welcoming space for collaboration, and contributors are expected to adhere to the [Contributor Covenant](http://contributor-covenant.org) code of conduct.

## License

The gem is available as open source under the terms of the [MIT License](https://opensource.org/licenses/MIT).