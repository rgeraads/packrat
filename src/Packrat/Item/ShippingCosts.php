<?php

namespace Packrat\Item;

use Money\Currency;
use Money\Money;

final class ShippingCosts extends Money
{
    public function __construct(int $amount, Currency $currency)
    {
        parent::__construct($amount, $currency);
    }
}
