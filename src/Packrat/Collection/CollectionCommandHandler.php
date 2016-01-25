<?php

namespace Packrat\Collection;

use Broadway\CommandHandling\CommandHandler;

class CollectionCommandHandler extends CommandHandler
{
    private $collectionRepository;

    public function __construct(CollectionRepository $collectionRepository)
    {
        $this->collectionRepository = $collectionRepository;
    }

    public function handleStartCollection(StartCollection $command)
    {
        $collection = Collection::start(
            $command->getCollectionId(),
            $command->getCollectionName(),
            $command->getUserId()
        );

        $this->collectionRepository->save($collection);
    }
}
