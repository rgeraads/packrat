<?php

namespace Packrat\Collection;

use Broadway\EventSourcing\EventSourcedAggregateRoot;
use Packrat\Item\Item;

final class Collection extends EventSourcedAggregateRoot
{
    private $id;
    private $userId;

    /**
     * @var Item[]
     */
    private $items = [];

    private function __construct()
    {
    }

    private function initialize(Id $collectionId, Id $userId)
    {
        $this->id     = $collectionId;
        $this->userId = $userId;
    }

    public function getAggregateRootId(): Id
    {
        return $this->id;
    }

    public static function start(Id $collectionId, CollectionName $collectionName, Id $userId): Collection
    {
        $collection = new Collection();

        $collection->apply(new CollectionWasStarted($collectionId, $collectionName, $userId));

        return $collection;
    }

    public static function remove(Id $collectionId, Id $userId)
    {
        $collection = new Collection();

        $collection->apply(new CollectionWasRemoved($collectionId, $userId));
    }

    public function addItem(Item $item)
    {
        $this->apply(new ItemWasAddedToCollection($this->id, $item));
    }

    public function removeItem(Item $item)
    {
        $this->apply(new ItemWasRemovedFromCollection($this->id, $item));
    }

    protected function applyCollectionWasStarted(CollectionWasStarted $event)
    {
        $this->initialize(
            $event->getCollectionId(),
            $event->getUserId()
        );
    }

    protected function applyItemWasAddedToCollection(ItemWasAddedToCollection $event)
    {
        $this->items[] = $event->getItem();
    }

    protected function applyItemWasRemovedFromCollection(ItemWasAddedToCollection $event)
    {
        foreach ($this->items as $key => $item) {
            if ($item->getAggregateRootId() === $event->getItem()->getAggregateRootId()) {
                unset($this->items[$key]);
            }
        }
    }
}
