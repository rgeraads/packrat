<?php

namespace Packrat\Item;

use Assert\Assertion as Assert;

final class Notes
{
    private $notes;

    public function __construct(string $notes)
    {
        $this->guardMaxLength($notes);

        $this->notes = $notes;
    }

    public function __toString(): string
    {
        return $this->notes;
    }

    private function guardMaxLength(string $notes)
    {
        Assert::maxLength($notes, 255);
    }
}
