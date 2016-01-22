<?php

namespace Packrat\Command;

use Packrat\Collection\CollectionId;
use Packrat\UserId;

final class RemoveCollection
{
    private $collectionId;
    private $userId;

    public function __construct(CollectionId $collectionId, UserId $userId)
    {
        $this->collectionId = $collectionId;
        $this->userId       = $userId;
    }

    public function getCollectionId(): CollectionId
    {
        return $this->collectionId;
    }

    public function getUserId(): UserId
    {
        return $this->userId;
    }
}
