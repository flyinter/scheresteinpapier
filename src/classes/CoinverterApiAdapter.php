<?php

namespace AshAllenDesign\Coinverter;

use AshAllenDesign\Coinverter\Contracts\Coinverter;
use Carbon\Carbon;
use GuzzleHttp\Client;

class CoinverterApiAdapter implements Coinverter
{
    /** @var string */
    private $API_KEY;

    /** @var string *