<?php

namespace Packrat;

use Broadway\EventSourcing\EventSourcedAggregateRoot;
use Packrat\Collection\CollectionId;
use Packrat\Event\CollectionRemoved;
use Packrat\Event\CollectionStarted;
use Packrat\Event\ItemAddedToCollection;
use Packrat\Event\ItemRemovedFromCollection;

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

    public static function start(CollectionId $collectionId, UserId $userId)
    {
        $collection = new Collection();

        $collection->apply(new CollectionStarted($collectionId, $userId));
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
