<?php

namespace Packrat\Item;

final class ItemWasCreated
{
    private $id;
    private $name;
    private $status;
    private $price;
    private $shippingCosts;
    private $notes;

    public function __construct(
        ItemId $id,
        ItemName $name,
        Status $status,
        Price $price,
        ShippingCosts $shippingCosts,
        Notes $notes
    ) {
        $this->id            = $id;
        $this->name          = $name;
        $this->status        = $status;
        $this->price         = $price;
        $this->shippingCosts = $shippingCosts;
        $this->notes         = $notes;
    }

    public function getId(): ItemId
    {
        return $this->id;
    }

    public function getName(): ItemName
    {
        return $this->name;
    }

    public function getStatus(): Status
    {
        return $this->status;
    }

    public function getPrice(): Price
    {
        return $this->price;
    }

    public function getShippingCosts(): ShippingCosts
    {
        return $this->shippingCosts;
    }

    public function getNotes(): Notes
    {
        return $this->notes;
    }
}
