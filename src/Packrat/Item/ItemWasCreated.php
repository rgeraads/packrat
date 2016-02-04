<?php

namespace Packrat\Item;

use Packrat\Collection\Id;

final class ItemWasCreated
{
    private $itemId;
    private $itemName;

    public function __construct(Id $itemId, Name $itemName)
    {
        $this->itemId   = $itemId;
        $this->itemName = $itemName;
    }

    public function getItemId(): Id
    {
        return $this->itemId;
    }

    public function getItemName(): Name
    {
        return $this->itemName;
    }
}
