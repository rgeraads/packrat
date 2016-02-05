<?php

namespace Packrat\Item;

use Money\Currency;
use Money\Money;

final class Price extends Money
{
    public function __construct(int $amount, Currency $currency)
    {
        parent::__construct($amount, $currency);
    }
}
