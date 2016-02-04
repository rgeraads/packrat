<?php

namespace Packrat\Collection;

use Rhumsaa\Uuid\Uuid;

final class Id
{
    public static function generate(): self
    {
        return new self(Uuid::uuid4()->toString());
    }
}
