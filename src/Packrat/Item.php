<?php

namespace Packrat;

use Broadway\EventSourcing\EventSourcedAggregateRoot;
use Money\Currency;
use Money\Money;

final class Item extends EventSourcedAggregateRoot
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

    private function __construct()
    {
    }

    private function initialize(
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

    public function getAggregateRootId(): ItemId
    {
        return $this->id;
    }

    public static function create()
    {

    }

    protected function applyNewItemCreated(NewItemCreated $event)
    {
        $this->initialize(
            $event->getItemId(),
            $event->getItemName()
        );
    }
}
