<?php

namespace Packrat\Item;

use Money\Currency;
use Money\CurrencyPair;

final class CurrencyConverter
{
    /**
     * @var ExchangeRate
     */
    private $exchangeRate;

    private function __construct(ExchangeRate $exchangeRate)
    {
        $this->exchangeRate = $exchangeRate;
    }

    public function convert(string $currency): CurrencyPair
    {
        new CurrencyPair(new Currency('EUR'), new Currency($currency), $this->exchangeRate->getForCurrency($currency));
    }
}
