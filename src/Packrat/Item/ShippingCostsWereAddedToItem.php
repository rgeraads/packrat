<?php

namespace Packrat\Item;

final class ShippingCostsWereAddedToItem
{
    private $shippingCosts;

    public function __construct(ShippingCosts $shippingCosts)
    {
        $this->shippingCosts = $shippingCosts;
    }

    public function getShippingCosts(): ShippingCosts
    {
        return $this->shippingCosts;
    }
}
