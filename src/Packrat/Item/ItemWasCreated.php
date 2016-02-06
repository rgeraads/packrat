<?php

namespace Packrat\Item;

final class ItemWasCreated
{
    private $id;
    private $name;
    private $category;

    public function __construct(ItemId $id, ItemName $name, Category $category)
    {
        $this->id       = $id;
        $this->name     = $name;
        $this->category = $category;
    }

    public function getId(): ItemId
    {
        return $this->id;
    }

    public function getName(): ItemName
    {
        return $this->name;
    }

    public function getCategory(): Category
    {
        return $this->category;
    }
}
