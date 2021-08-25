<?php

namespace AshAllenDesign\Coinverter;

use AshAllenDesign\Coinverter\Contracts\Coinverter;
use Carbon\Carbon;
use GuzzleHttp\Client;

class CoinverterApiAdapter implements Coinverter
{
    /** @var string */
    private $API_KEY;

    /** @var string */
    private $BASE_URL;

    /** @var string */
    private $ACCOUNT_TYPE;

    /** @var Client */
    private $client;

    /**
     * CoinverterApiAdapter constructor.
     * @param Client|null $client
     * @param string|null $apiKey
     * @throws \Exception
     */
    public function __construct(Client $client = null, string $apiKey = null)
    {
        $this->API_KEY = $apiKey ?? config('coinverter.currencyconverterapi.api-key');
        $this->ACCOUNT_TYPE = $this->determineAccountType();
        $this->BASE_URL = $this->determineBaseUrl();

        $this->client = $client ?? (new Client());
    }

    /**
     * @return string
     * @throws \Exception
     */
    private function determineAccountType()
    {
        if (config('coinverter.currencyconverterapi.account-type') == 'free') {
            re