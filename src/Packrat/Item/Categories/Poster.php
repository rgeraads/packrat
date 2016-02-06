<?php

namespace Packrat\Item\Categories;

use Assert\Assertion as Assert;
use Packrat\Item\Category;

final class Poster implements Category
{
    private $heightInMillimeters;
    private $widthInMillimeters;

    public function __construct(int $heightInMillimeters, int $widthInMillimeters)
    {
        Assert::greaterThan($heightInMillimeters, 0);
        Assert::greaterThan($widthInMillimeters, 0);

        $this->heightInMillimeters = $heightInMillimeters;
        $this->widthInMillimeters  = $widthInMillimeters;
    }

    public function getHeightInMillimeters(): int
    {
        return $this->heightInMillimeters;
    }

    public function getWidthInMillimeters(): int
    {
        return $this->widthInMillimeters;
    }

    public function match(): string
    {
        return get_class();
    }
}
