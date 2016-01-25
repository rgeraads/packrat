<?php

namespace Packrat\Item;

class ItemStatusUpdated
{
    private $status;

    public function __construct(Status $status)
    {
        $this->status = $status;
    }
}
