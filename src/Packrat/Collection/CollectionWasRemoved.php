<?php

namespace Packrat\Collection;

use Packrat\User\UserId;

final class CollectionWasRemoved
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
