
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
    public function register()
    {
        $this->app->singleton(Coinverter::class, function ($app) {
            switch ($app->make('config')->get('coinverter.driver')) {
                case 'currencyconverterapi':
                    return new CoinverterApiAdapter();