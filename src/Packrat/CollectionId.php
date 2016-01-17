<?php

namespace Packrat;

use Rhumsaa\Uuid\Uuid;

final class CollectionId
{
    public static function generate(): self
    {
        return new self(Uuid::uuid4()->toString());
    }
}
