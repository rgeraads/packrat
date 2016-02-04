<?php

namespace Packrat\Item;

use Packrat\Collection\Id;

final class ItemWasDeleted
{
    private $itemId;

    public function __construct(Id $itemId)
    {
        $this->itemId = $itemId;
    }

    public function getItemId(): Id
    {
        return $this->itemId;
    }
}
