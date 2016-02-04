<?php

namespace Packrat\Item;

use Money\Money;

final class PriceWasAddedToItem
{
    private $price;

    public function __construct(Money $price)
    {
        $this->price = $price;
    }

    public function getPrice(): Money
    {
        return $this->price;
    }
}
