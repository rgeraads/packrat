<?php

namespace Packrat;

use ExchangeRate\ExchangeRateRetriever;
use Money\Currency;
use Money\CurrencyPair;

final class CurrencyConverter
{
    /**
     * @var ExchangeRateRetriever
     */
    private $exchangeRate;

    private function __construct(ExchangeRateRetriever $exchangeRate)
    {
        $this->exchangeRate = $exchangeRate;
    }

    public function convert(Currency $baseCurrency, Currency $currency): CurrencyPair
    {
        $exchangeRate = $this->exchangeRate->getFor($currency);

        return new CurrencyPair(new Currency($baseCurrency), new Currency($currency), $exchangeRate);
    }
}
