# FourPartyExpress

Unofficial PHP API wrapper for WebService of 4px (http://express.4px.com/)


[![Build Status](https://travis-ci.org/dakalab/FourPartyExpress.svg?branch=master)](https://travis-ci.org/dakalab/FourPartyExpress)
[![codecov](https://codecov.io/gh/dakalab/FourPartyExpress/branch/master/graph/badge.svg)](https://codecov.io/gh/dakalab/FourPartyExpress)

## Install

```
composer require Dakalab/FourPartyExpress
```

## Usage

Order tracking:

```
use Dakalab\FourPartyExpress\ToolClient;

$toolClient = new ToolClient('your-token');
$res = $toolClient->cargoTrackingService('the-tracking-no');

print_r($res);
```
