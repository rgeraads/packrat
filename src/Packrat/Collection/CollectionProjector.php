<?php

namespace Packrat\Collection;

use Broadway\ReadModel\Projector;

class CollectionProjector extends Projector
{
    public function applyCollectionStarted(CollectionStarted $event)
    {
        $readModel = new CollectionReadModel();

        $readModel->name = $event->getCollectionName();
    }
}
