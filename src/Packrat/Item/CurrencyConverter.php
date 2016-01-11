<?php

namespace Packrat\Item;

use Money\Currency;
use Money\CurrencyPair;
use Packrat\ExchangeRate\ExchangeRateRetriever;

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

    public function convert(Currency $currency): CurrencyPair
    {
        new CurrencyPair(new Currency('EUR'), new Currency($currency), $this->exchangeRate->getFor($currency));
    }
}
