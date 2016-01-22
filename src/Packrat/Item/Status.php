<?php

namespace Packrat\Item;

use Assert\Assertion as Assert;

final class Status
{
    const AVAILABLE_STATUSES = [
        'notOwned',
        'toBeAnnounced',
        'preOrdered',
        'ordered',
        'paid',
        'shipped',
        'owned',
        'unavailable',
    ];

    private $status;

    public function __construct(string $status)
    {
        Assert::inArray($status, self::AVAILABLE_STATUSES);

        $this->status = $status;
    }

    public static function notOwned(): self
    {
        return new self(__FUNCTION__);
    }

    public static function toBeAnnounced(): self
    {
        return new self(__FUNCTION__);
    }

    public static function preOrdered(): self
    {
        return new self(__FUNCTION__);
    }

    public static function ordered(): self
    {
        return new self(__FUNCTION__);
    }

    public static function paid(): self
    {
        return new self(__FUNCTION__);
    }

    public static function shipped(): self
    {
        return new self(__FUNCTION__);
    }

    public static function owned(): self
    {
        return new self(__FUNCTION__);
    }

    public static function unavailable(): self
    {
        return new self(__FUNCTION__);
    }

    public function __toString(): string
    {
        return $this->status;
    }
}
