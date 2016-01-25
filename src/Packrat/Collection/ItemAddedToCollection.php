<?php

namespace Packrat\Collection;

use Packrat\Item\Item;

final class ItemAddedToCollection
{
    private $collectionId;
    private $item;

    public function __construct(CollectionId $collectionId, Item $item)
    {
        $this->collectionId = $collectionId;
        $this->item         = $item;
    }

    public function getCollectionId(): CollectionId
    {
        return $this->collectionId;
    }

    public function getItem(): Item
    {
        return $this->item;
    }
}
