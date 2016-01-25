<?php

namespace Packrat\Collection;

use Broadway\EventSourcing\EventSourcedAggregateRoot;
use Packrat\Item\Item;
use Packrat\User\UserId;

final class Collection extends EventSourcedAggregateRoot
{
    private $id;
    private $userId;
    private $items = [];

    private function __construct()
    {
    }

    private function initialize(CollectionId $collectionId, UserId $userId)
    {
        $this->id     = $collectionId;
        $this->userId = $userId;
    }

    public function getAggregateRootId(): CollectionId
    {
        return $this->id;
    }

    public static function start(CollectionId $collectionId, CollectionName $collectionName, UserId $userId): Collection
    {
        $collection = new Collection();

        $collection->apply(new CollectionStarted($collectionId, $collectionName, $userId));

        return $collection;
    }

    public static function remove(CollectionId $collectionId, UserId $userId)
    {
        $collection = new Collection();

        $collection->apply(new CollectionRemoved($collectionId, $userId));
    }

    public function addItem(Item $item)
    {
        $this->apply(new ItemAddedToCollection($this->id, $item));
    }

    public function removeItem(Item $item)
    {
        $this->apply(new ItemRemovedFromCollection($this->id, $item));
    }

    protected function applyCollectionStarted(CollectionStarted $event)
    {
        $this->initialize(
            $event->getCollectionId(),
            $event->getUserId()
        );
    }

    protected function applyItemAddedToCollection(ItemAddedToCollection $event)
    {
        $this->items[] = $event->getItem();
    }
}
