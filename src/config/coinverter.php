
<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Drivers
    |--------------------------------------------------------------------------
    |
    | Here you can choose between the different currency conversion API
    | services that are available.
    |
    | Currently available:
    | 'currencyconverterapi' => https://www.currencyconverterapi.com/
    | 'exchangeratesapi'     => https://exchangeratesapi.io/
    |
    */
    'driver'               => env('COINVERTER_DRIVER'),

    /*
    |--------------------------------------------------------------------------
    | Currency Converter API (https://www.currencyconverterapi.com/)
    |--------------------------------------------------------------------------
    |
    | Configurable options for this API service.
    |
    | Possible account types: 'free', 'pro'.
    |
    */