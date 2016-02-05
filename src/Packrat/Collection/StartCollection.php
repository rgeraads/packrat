<?php

namespace Packrat\Collection;

use Packrat\User\UserId;

final class StartCollection
{
    private $collectionId;
    private $collectionName;
    private $userId;

    public function __construct(CollectionId $collectionId, CollectionName $collectionName, UserId $userId)
    {
        $this->collectionId   = $collectionId;
        $this->collectionName = $collectionName;
        $this->userId         = $userId;
    }

    public function getCollectionId(): CollectionId
    {
        return $this->collectionId;
    }

    public function getCollectionName(): CollectionName
    {
        return $this->collectionName;
    }

    public function getUserId(): UserId
    {
        return $this->userId;
    }
}
