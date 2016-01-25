<?php

namespace Packrat\Item;

use Broadway\EventSourcing\EventSourcedAggregateRoot;

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

    private function initialize(ItemId $id, ItemName $name)
    {
        $this->id   = $id;
        $this->name = $name;
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

        $item->apply(new ItemStatusUpdated($status));
    }

    protected function applyNewItemCreated(ItemCreated $event)
    {
        $this->initialize(
            $event->getItemId(),
            $event->getItemName()
        );
    }
}
