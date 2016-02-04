<?php

namespace Packrat\Collection;

final class CollectionWasStarted
{
    private $collectionId;
    private $collectionName;
    private $userId;

    public function __construct(Id $collectionId, CollectionName $collectionName, Id $userId)
    {
        $this->collectionId   = $collectionId;
        $this->collectionName = $collectionName;
        $this->userId         = $userId;
    }

    public function getCollectionId(): Id
    {
        return $this->collectionId;
    }

    public function getCollectionName(): CollectionName
    {
        return $this->collectionName;
    }

    public function getUserId(): Id
    {
        return $this->userId;
    }
}
