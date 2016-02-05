<?php

namespace Packrat\Collection;

use Broadway\EventSourcing\EventSourcedAggregateRoot;
use Packrat\Item\Item;
use Packrat\User\UserId;

final class Collection extends EventSourcedAggregateRoot
{
    private $collectionId;
    private $collectionName;
    private $userId;

    /**
     * @var Item[]
     */
    private $items = [];

    private function __construct()
    {
    }

    private function initialize(CollectionId $collectionId, CollectionName $collectionName, UserId $userId)
    {
        $this->collectionId   = $collectionId;
        $this->collectionName = $collectionName;
        $this->userId         = $userId;
    }

    public function getAggregateRootId(): CollectionId
    {
        return $this->collectionId;
    }

    public static function start(CollectionId $collectionId, CollectionName $collectionName, UserId $userId): Collection
    {
        $collection = new Collection();

        $collection->apply(new CollectionWasStarted($collectionId, $collectionName, $userId));

        return $collection;
    }

    public static function remove(CollectionId $collectionId, UserId $userId)
    {
        $collection = new Collection();

        $collection->apply(new CollectionWasRemoved($collectionId, $userId));
    }

    public function addItem(Item $item)
    {
        $this->apply(new ItemWasAddedToCollection($this->collectionId, $item));
    }

    public function removeItem(Item $item)
    {
        $this->apply(new ItemWasRemovedFromCollection($this->collectionId, $item));
    }

    protected function applyCollectionWasStarted(CollectionWasStarted $event)
    {
        $this->initialize(
            $event->getCollectionId(),
            $event->getCollectionName(),
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
