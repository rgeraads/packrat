<?php

namespace Packrat\Collection;

final class CollectionWasRemoved
{
    private $collectionId;
    private $userId;

    public function __construct(Id $collectionId, Id $userId)
    {
        $this->collectionId = $collectionId;
        $this->userId       = $userId;
    }

    public function getCollectionId(): Id
    {
        return $this->collectionId;
    }

    public function getUserId(): Id
    {
        return $this->userId;
    }
}
