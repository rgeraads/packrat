<?php

namespace Packrat;

use Money\Currency;
use Money\Money;

final class Item
{
    private $id;
    private $name;
    private $image;
    private $store;
    private $status;
    private $currency;
    private $price;
    private $shippingCost;
    private $notes;

    public function __construct(
        ItemId $id,
        string $name,
        $image,
        $store,
        $status,
        Currency $currency,
        Money $price,
        Money $shippingCost,
        $notes
    ) {
        $this->id           = $id;
        $this->name         = $name;
        $this->image        = $image;
        $this->store        = $store;
        $this->status       = $status;
        $this->currency     = $currency;
        $this->price        = $price;
        $this->shippingCost = $shippingCost;
        $this->notes        = $notes;
    }

    public function getId(): ItemId
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function getStore()
    {
        return $this->store;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function getCurrency(): Currency
    {
        return $this->currency;
    }

    public function getPrice(): Money
    {
        return $this->price;
    }

    public function getShippingCost(): Money
    {
        return $this->shippingCost;
    }

    public function getNotes()
    {
        return $this->notes;
    }
}
