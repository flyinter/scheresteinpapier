
<?php

namespace AshAllenDesign\Coinverter;

use AshAllenDesign\Coinverter\Contracts\Coinverter;
use Carbon\Carbon;
use GuzzleHttp\Client;

class ExchangeRatesApiAdapter implements Coinverter
{
    /** @var string */
    private $BASE_URL;

    /** @var Client */
    private $client;

    /**