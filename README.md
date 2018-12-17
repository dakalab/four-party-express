# four-party-express

Unofficial PHP API wrapper for WebService of 4px (http://express.4px.com/)


[![Build Status](https://travis-ci.org/dakalab/four-party-express.svg?branch=master)](https://travis-ci.org/dakalab/four-party-express)
[![codecov](https://codecov.io/gh/dakalab/four-party-express/branch/master/graph/badge.svg)](https://codecov.io/gh/dakalab/four-party-express)
[![Latest Stable Version](https://poser.pugx.org/dakalab/four-party-express/v/stable)](https://packagist.org/packages/dakalab/four-party-express)
[![Total Downloads](https://poser.pugx.org/dakalab/four-party-express/downloads)](https://packagist.org/packages/dakalab/four-party-express)
[![PHP Version](https://img.shields.io/php-eye/dakalab/four-party-express.svg)](https://packagist.org/packages/dakalab/four-party-express)
[![License](https://poser.pugx.org/dakalab/four-party-express/license.svg)](https://packagist.org/packages/dakalab/four-party-express)

## Install

```
composer require dakalab/four-party-express
```

## Usage

Order tracking:

```
use Dakalab\FourPartyExpress\ToolClient;

$toolClient = new ToolClient('your-token');
$res = $toolClient->cargoTrackingService('the-tracking-no');

print_r($res);
```
