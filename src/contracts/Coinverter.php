<?php

namespace AshAllenDesign\Coinverter\Contracts;

use Carbon\Carbon;

interface Coinverter
{
    public function exchangeRate(string $from, string $to, Carbon $date = null);

    public function exchangeRateBetweenDateRange(string $from, string $to, Carbon $date, Carbon $endDate);

    public funct