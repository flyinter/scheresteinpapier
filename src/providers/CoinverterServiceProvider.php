
<?php

namespace AshAllenDesign\Coinverter\Providers;

use AshAllenDesign\Coinverter\CoinverterApiAdapter;
use AshAllenDesign\Coinverter\Contracts\Coinverter;
use AshAllenDesign\Coinverter\ExchangeRatesApiAdapter;
use Illuminate\Support\ServiceProvider;

class CoinverterServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */