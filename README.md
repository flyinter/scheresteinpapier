
# Coinverter

<p align="center"><img src="./coinverter.png"></p>


## Introduction
Coinverter is a simple Laravel package built to interact with currency conversion APIs.

It has been built and tested using Laravel 5.8 and PHP 7.2.

## Installation
To install the package, run the command:

``` composer install ashallendesign/coinverter ```

### Drivers
Currently, this package supports the following currency conversion APIs:
* Currency Converter API: https://www.currencyconverterapi.com/
* Exchange Rates API: https://exchangeratesapi.io/

#### Currency Converter API (https://www.currencyconverterapi.com/)
To use this API, register for an account at their website.

Once you have the provided key, set the following environment variables:
```
COINVERTER_DRIVER=currencyconverterapi
CURRENCY_CONVERTER_API_KEY=your_key_to_go_here
CURRENCY_CONVERTER_API_ACCOUNT_TYPE=free
```

Note: It's important to state whether if you are using a 'free' or 'pro' account for this service because the API routes
are different depending on the account type.

####  Exchange Rates API (https://exchangeratesapi.io/)