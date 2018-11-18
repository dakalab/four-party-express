# FourPartyExpress

Unofficial PHP API wrapper for WebService of 4px (http://express.4px.com/)

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
