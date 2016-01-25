<?php

namespace Packrat\Item;

use Assert\Assertion as Assert;

final class Category
{
    const BOOK  = 'book';
    const MOVIE = 'movie';
    const MUSIC = 'music';

    const AVAILABLE_CATEGORIES = [
        self::BOOK,
        self::MOVIE,
        self::MUSIC,
    ];

    private $category;

    public function __construct(string $category)
    {
        Assert::inArray($category, self::AVAILABLE_CATEGORIES);

        $this->category = $category;
    }

    public function getCategory(): string
    {
        return $this->category;
    }
}
