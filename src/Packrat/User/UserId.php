<?php

namespace Packrat\User;

use Rhumsaa\Uuid\Uuid;

final class UserId
{
    public static function generate(): self
    {
        return new self(Uuid::uuid4()->toString());
    }
}
