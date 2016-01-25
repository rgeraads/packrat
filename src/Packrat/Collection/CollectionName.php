<?php

namespace Packrat\Collection;

use Assert\Assertion as Assert;

final class CollectionName
{
    private $collectionName;

    public function __construct(string $collectionName)
    {
        $this->guardMaxNameLength($collectionName);

        $this->collectionName = $collectionName;
    }

    public function __toString(): string
    {
        return $this->collectionName;
    }

    private function guardMaxNameLength(string $collectionName)
    {
        Assert::maxLength($collectionName, 255);
    }
}
