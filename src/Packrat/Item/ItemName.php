<?php

namespace Packrat\Item;

final class ItemName
{
    private $itemName;

    public function __construct(string $itemName)
    {
        $this->itemName = $itemName;
    }

    public function __toString(): string
    {
        return $this->itemName;
    }
}
