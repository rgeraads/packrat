<?php

require_once 'vendor/autoload.php';

use Broadway\CommandHandling\SimpleCommandBus;
use Broadway\EventHandling\SimpleEventBus;
use Broadway\EventStore\InMemoryEventStore;
use Packrat\Collection\Collection;
use Packrat\Collection\CollectionId;
use Packrat\Collection\CollectionName;
use Packrat\Collection\CollectionProjector;
use Packrat\Collection\CollectionRepository;
use Packrat\User\UserId;

$commandBus = new SimpleCommandBus();
$eventStore = new InMemoryEventStore();
$eventBus = new SimpleEventBus();

$collectionRepository = new CollectionRepository($eventStore, $eventBus);
$collectionProjector = new CollectionProjector();
$eventBus->subscribe($collectionProjector);

$collection = Collection::start(CollectionId::generate(), new CollectionName('bla'), UserId::generate());
$collectionRepository->save($collection);
