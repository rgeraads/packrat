<?php

namespace Packrat\Item;

use Assert\Assertion as Assert;

final class Name
{
    private $name;

    public function __construct(string $itemName)
    {
        $this->guardMaxNameLength($itemName);

        $this->name = $itemName;
    }

    public function __toString(): string
    {
        return $this->name;
    }

    private function guardMaxNameLength(string $itemName)
    {
        Assert::maxLength($itemName, 255);
    }
}
