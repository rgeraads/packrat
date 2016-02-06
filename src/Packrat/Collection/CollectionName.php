<?php

namespace Packrat\Collection;

use Assert\Assertion as Assert;

final class CollectionName
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
