<?php

namespace Packrat\Item;

use Assert\Assertion as Assert;

final class ItemName
{
    private $name;

    public function __construct(string $name)
    {
        $this->guardMinLength($name);
        $this->guardMaxLength($name);

        $this->name = $name;
    }

    public function __toString(): string
    {
        return $this->name;
    }

    private function guardMinLength(string $name)
    {
        Assert::minLength($name, 1);
    }

    private function guardMaxLength(string $name)
    {
        Assert::maxLength($name, 255);
    }
}
