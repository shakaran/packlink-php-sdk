# packlink-php-sdk

A PHP library for implement the Packlink API REST service from Packlink Shipping, S.L. https://packlink.com

# PackLink PHP client

This is the PackLink PHP SDK. This SDK contains methods for easily interacting
with the PackLink API.
Below are examples to get you started.

[![Latest Version](https://img.shields.io/github/release/shakaran/packlink-php.svg?style=flat-square)](https://github.com/shakaran/packlink-php/releases)
[![Build Status](https://img.shields.io/travis/shakaran/packlink-php/master.svg?style=flat-square)](https://travis-ci.org/shakaran/packlink-php)
[![Code Coverage](https://img.shields.io/scrutinizer/coverage/g/shakaran/packlink-php.svg?style=flat-square)](https://scrutinizer-ci.com/g/shakaran/packlink-php)
[![Quality Score](https://img.shields.io/scrutinizer/g/shakaran/packlink-php.svg?style=flat-square)](https://scrutinizer-ci.com/g/shakaran/packlink-php)
[![Total Downloads](https://img.shields.io/packagist/dt/shakaran/packlink-php.svg?style=flat-square)](https://packagist.org/packages/shakaran/packlink-php)
[![Join the chat at https://gitter.im/shakaran/packlink-php](https://badges.gitter.im/packlink/packlink-php.svg)](https://gitter.im/shakaran/packlink-php?utm_source=badge&utm_medium=badge&utm_campaign=pr-badge&utm_content=badge)

## Installation

To install the SDK, you will need to be using [Composer](http://getcomposer.org/)
in your project.
If you aren't using Composer yet, it's really simple! Here's how to install
composer:

```bash
curl -sS https://getcomposer.org/installer | php
```

The packlink api client is not hard coupled to Guzzle or any other library that sends
HTTP messages. It uses the [PSR-18](https://www.php-fig.org/psr/psr-18/) client abstraction.
This will give you the flexibilty to choose what PSR-7 implementation and HTTP client to use.

If you just want to get started quickly you should run the following command:

```bash
composer require shakaran/packlink-php-sdk kriswallsmith/buzz nyholm/psr7
```

## Quick start

To start using the Api SDK client, you need create an instance with your api key like this:

```php
<?php

namespace MyCompany;

require __DIR__ . '/vendor/autoload.php';

use PackLink\ApiClient;

$apiKey = 'your_api_key';

// Create and configure the initial api client
$api = ApiClient::create($apiKey, 'https://api.packlink.com');

```

## Examples

Under the [Examples directory][https://github.com/shakaran/packlink-php-sdk/tree/master/examples] you can find several examples of how to use more deeply this API.

