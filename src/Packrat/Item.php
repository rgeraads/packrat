<?php

namespace Packrat;

use Broadway\EventSourcing\EventSourcedAggregateRoot;
use Money\Currency;
use Money\Money;
use Packrat\Item\ItemId;
use Packrat\Item\ItemName;
use Packrat\Item\Status;

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
        ItemName $name,
        Image $image = null,
        Store $store = null,
        Status $status = null,
        Currency $currency = null,
        Money $price = null,
        Money $shippingCost = null,
        string $notes = null
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

    public static function create(ItemId $itemId, ItemName $itemName)
    {
        $item = new Item();

        $item->apply(new ItemCreated($itemId, $itemName));
    }

    public function setStatus(Status $status)
    {
        $item = new Item();

        $item->apply(new StatusUpdated($status));
    }

    protected function applyNewItemCreated(ItemCreated $event)
    {
        $this->initialize(
            $event->getItemId(),
            $event->getItemName()
        );
    }
}
