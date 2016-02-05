<?php

namespace Packrat\Item;

final class PriceWasAddedToItem
{
    private $price;

    public function __construct(Price $price)
    {
        $this->price = $price;
    }

    public function getPrice(): Price
    {
        return $this->price;
    }
}
