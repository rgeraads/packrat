<?php

namespace Packrat\Item\Categories;

use Assert\Assertion as Assert;
use Packrat\Item\Category;

final class Statue implements Category
{
    private $brand;

    public function __construct(string $brand)
    {
        Assert::betweenLength($brand, 1, 255);

        $this->brand = $brand;
    }

    public function getBrand(): string
    {
        return $this->brand;
    }

    public function match(): string
    {
        return get_class();
    }
}
