# Forecast PHP

[![Latest Version](https://img.shields.io/github/release/nwidart/forecast-php.svg?style=flat-square)](https://github.com/nwidart/forecast-php/releases)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)
[![Build Status](https://img.shields.io/travis/nWidart/forecast-php/master.svg?style=flat-square)](https://travis-ci.org/nWidart/forecast-php)
[![Coverage Status](https://img.shields.io/scrutinizer/coverage/g/nWidart/forecast-php.svg?style=flat-square)](https://scrutinizer-ci.com/g/nWidart/forecast-php/code-structure)
[![Quality Score](https://img.shields.io/scrutinizer/g/nWidart/forecast-php.svg?style=flat-square)](https://scrutinizer-ci.com/g/nWidart/forecast-php)
[![SensioLabs Insight](https://img.shields.io/sensiolabs/i/072037a8-c4d0-4ef8-ad9d-7edcdaea4619.svg)](https://insight.sensiolabs.com/projects/072037a8-c4d0-4ef8-ad9d-7edcdaea4619)
[![Total Downloads](https://img.shields.io/packagist/dt/nwidart/forecast-php.svg?style=flat-square)](https://packagist.org/packages/nwidart/forecast-php)

A PHP client package for the [Forecast.io](https://forecast.io/) [API](https://developer.forecast.io/).

Want to use this inside a Laravel application? Check out the [Laravel-Forecast](https://github.com/nWidart/Laravel-forecast) package.

## Install

Via Composer

``` bash
$ composer require nwidart/forecast-php
```

## Usage

``` php
$forecast = new \Nwidart\ForecastPhp\Forecast('your_api_key');

// Simple latitude and longitude
$info = $forecast->get('40.7324296', '-73.9977264');

// Fetch weather at a given time
$info = $forecastPhp->get('40.7324296', '-73.9977264', '2013-05-06T12:00:00-0400');

// Add options to the request
$info = $forecastPhp->setOptions(['units' => 'si',])->get('40.7324296', '-73.9977264');

```

For more details and all available options check the [official documentation](https://developer.forecast.io/docs/v2).

An example response:

``` json
{
  "latitude": 40.7324296,
  "longitude": -73.9977264,
  "timezone": "America/New_York",
  "offset": -4,
  "currently": {
    "time": 1438445386,
    "summary": "Partly Cloudy",
    "icon": "partly-cloudy-day",
    "nearestStormDistance": 63,
    "nearestStormBearing": 360,
    "precipIntensity": 0,
    "precipProbability": 0,
    "temperature": 84.71,
    "apparentTemperature": 85.39,
    "dewPoint": 62.25,
    "humidity": 0.47,
    "windSpeed": 7.95,
    "visibility": 10,
    "cloudCover": 0.59,
    "pressure": 1010.33,
    "ozone": 323.24
  },
  "minutely": {
    ...
  },
  "hourly": {
    ...
  },
  "daily": {
    ...
  },
  "flags": {
    ...
  },
  "headers": {
    ...
  }
}
```

## Testing

``` bash
$ phpunit
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Credits

- [Nicolas Widart](https://github.com/nWidart)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
