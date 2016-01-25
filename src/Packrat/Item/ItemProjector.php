<?php

namespace Packrat\Item;

use Broadway\ReadModel\Projector;

class ItemProjector extends Projector
{
    public function applyItemCreated(ItemCreated $event)
    {
        $readModel = new ItemReadModel();

        $readModel->name = $event->getItemName();
    }
}
