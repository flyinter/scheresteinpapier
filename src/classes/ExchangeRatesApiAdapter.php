
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

    /**
     * @param string $from
     * @param string $to
     * @param Carbon $date
     * @param Carbon $endDate
     * @param array  $conversions
     * @return mixed
     * @throws \Exception
     */
    public function exchangeRateBetweenDateRange(string $from, string $to, Carbon $date, Carbon $endDate, $conversions = [])
    {
        $result = $this->makeRequest('/history', [
            'base'     => $from,
            'start_at' => $date->format('Y-m-d'),
            'end_at'   => $endDate->format('Y-m-d'),
            'symbols'  => $to,
        ]);

        foreach ($result->rates as $date => $rate) {
            $conversions[$date] = $rate->{$to};
        }

        return $conversions;
    }

    /**
     * @param float       $value
     * @param string      $from
     * @param string      $to
     * @param Carbon|null $date
     * @return float|int
     */
    public function convert(float $value, string $from, string $to, Carbon $date = null)
    {
        return $value * $this->exchangeRate($from, $to, $date);
    }

    /**
     * @param float  $value