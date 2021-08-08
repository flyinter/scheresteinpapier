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
     * @param 