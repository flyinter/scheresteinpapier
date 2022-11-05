
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
     * CoinverterApiAdapter constructor.
     * @param Client|null $client
     */
    public function __construct(Client $client = null)
    {
        $this->BASE_URL = 'https://api.exchangeratesapi.io';

        $this->client = $client ?? (new Client());
    }

    /**
     * @param array $currencies
     * @return array
     */