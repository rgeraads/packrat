<?php

namespace Packrat\Item;

use Rhumsaa\Uuid\Uuid;

final class ItemId
{
    public static function generate(): self
    {
        return new self(Uuid::uuid4()->toString());
    }
}
