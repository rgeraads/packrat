<?php

namespace Packrat\Item;

use Money\Money;

final class ShippingCostsOfItemWereUpdated
{
    private $shippingCosts;

    public function __construct(Money $shippingCosts)
    {
        $this->shippingCosts = $shippingCosts;
    }

    public function getShippingCosts(): Money
    {
        return $this->shippingCosts;
    }
}
