<?php

namespace Packrat\Item;

use Assert\Assertion as Assert;

final class ItemName
{
    private $itemName;

    public function __construct(string $itemName)
    {
        $this->guardMaxNameLength($itemName);

        $this->itemName = $itemName;
    }

    public function __toString(): string
    {
        return $this->itemName;
    }

    private function guardMaxNameLength(string $itemName)
    {
        Assert::maxLength($itemName, 255);
    }
}
