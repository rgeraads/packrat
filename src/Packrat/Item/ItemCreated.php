<?php

namespace Packrat\Item;

final class ItemCreated
{
    private $itemId;
    private $itemName;

    public function __construct(ItemId $itemId, ItemName $itemName)
    {
        $this->itemId   = $itemId;
        $this->itemName = $itemName;
    }

    public function getItemId(): ItemId
    {
        return $this->itemId;
    }

    public function getItemName(): ItemName
    {
        return $this->itemName;
    }
}
