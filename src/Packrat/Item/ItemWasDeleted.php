<?php

namespace Packrat\Item;

final class ItemWasDeleted
{
    private $itemId;

    public function __construct(ItemId $itemId)
    {
        $this->itemId = $itemId;
    }

    public function getItemId(): ItemId
    {
        return $this->itemId;
    }
}
