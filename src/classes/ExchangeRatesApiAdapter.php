
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
    public function currencies(array $currencies = [])
    {
        $response = $this->makeRequest('/latest');

        $currencies[] = $response->base;

        foreach ($response->rates as $currency => $rate) {
            $currencies[] = $currency;
        }

        return $currencies;
    }

    /**
     * @param string      $from
     * @param string      $to
     * @param Carbon|null $date
     * @return mixed
     */
    public function exchangeRate(string $from, string $to, Carbon $date = null)
    {
        return $date
            ? $this->makeRequest('/'.$date->format('Y-m-d'), ['base' => $from])->rates->$to
            : $this->makeRequest('/latest', ['base' => $from])->rates->$to;
    }