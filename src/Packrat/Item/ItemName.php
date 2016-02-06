<?php

namespace Packrat\Item;

use Assert\Assertion as Assert;

final class ItemName
{
    private $name;

    public function __construct(string $name)
    {
        Assert::betweenLength($name, 1, 255);

        $this->name = $name;
    }

    public function __toString(): string
    {
        return $this->name;
    }
}
