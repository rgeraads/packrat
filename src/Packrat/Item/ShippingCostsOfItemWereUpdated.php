<?php

namespace Packrat\Item;

final class ShippingCostsOfItemWereUpdated
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
