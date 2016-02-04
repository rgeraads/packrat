<?php

namespace Packrat\Collection;

use Packrat\User\UserId;

final class StartCollection
{
    private $collectionId;
    private $collectionName;
    private $userId;

    public function __construct(Id $collectionId, CollectionName $collectionName, UserId $userId)
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

    public function getUserId(): UserId
    {
        return $this->userId;
    }
}
