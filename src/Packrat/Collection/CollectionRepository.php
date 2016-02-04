<?php

namespace Packrat\Collection;

use Broadway\EventHandling\EventBusInterface;
use Broadway\EventSourcing\AggregateFactory\NamedConstructorAggregateFactory;
use Broadway\EventSourcing\EventSourcingRepository;
use Broadway\EventStore\EventStoreInterface;

class CollectionRepository extends EventSourcingRepository
{
    public function __construct(
        EventStoreInterface $eventStore,
        EventBusInterface $eventBus,
        array $eventStreamDecorators = []
    ) {
        parent::__construct(
            $eventStore,
            $eventBus,
            Collection::class,
            new NamedConstructorAggregateFactory(),
            $eventStreamDecorators
        );
    }

    public function findById(Id $collectionId): Collection
    {
        return $this->load((string) $collectionId);
    }
}
