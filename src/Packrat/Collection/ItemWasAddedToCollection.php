<?php

namespace Packrat\Collection;

use Packrat\Item\Item;

final class ItemWasAddedToCollection
{
    private $collectionId;
    private $item;

    public function __construct(Id $collectionId, Item $item)
    {
        $this->collectionId = $collectionId;
        $this->item         = $item;
    }

    public function getCollectionId(): Id
    {
        return $this->collectionId;
    }

    public function getItem(): Item
    {
        return $this->item;
    }
}
