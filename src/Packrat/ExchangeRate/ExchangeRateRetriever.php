<?php

namespace Packrat\ExchangeRate;

use GuzzleHttp\ClientInterface;
use Money\Currency;

interface ExchangeRateRetriever
{
    public function __construct(ClientInterface $client);

    /**
     * @param Currency $currency
     *
     * @return float
     */
    public function getFor(Currency $currency): float;
}
