<?php

namespace Packrat\Item;

use Broadway\ReadModel\Projector;

class ItemProjector extends Projector
{
    public function applyItemCreated(ItemWasCreated $event)
    {
        $readModel = new ItemReadModel();

        $readModel->name = $event->getItemName();
    }
}
