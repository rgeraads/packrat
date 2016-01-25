<?php

namespace Packrat\Item;

use Assert\Assertion as Assert;

final class Status
{
    const NOT_OWNED   = 'notOwned';
    const TBA         = 'toBeAnnounced';
    const PRE_ORDERED = 'preOrdered';
    const ORDERED     = 'ordered';
    const PAID        = 'paid';
    const SHIPPED     = 'shipped';
    const CUSTOMS     = 'customs';
    const OWNED       = 'owned';
    const UNAVAILABLE = 'unavailable';

    const AVAILABLE_STATUSES = [
        self::NOT_OWNED,
        self::TBA,
        self::PRE_ORDERED,
        self::ORDERED,
        self::PAID,
        self::SHIPPED,
        self::CUSTOMS,
        self::OWNED,
        self::UNAVAILABLE,
    ];

    private $status;

    public function __construct(string $status)
    {
        Assert::inArray($status, self::AVAILABLE_STATUSES);

        $this->status = $status;
    }

    public static function notOwned(): self
    {
        return new self(self::NOT_OWNED);
    }

    public static function toBeAnnounced(): self
    {
        return new self(self::TBA);
    }

    public static function preOrdered(): self
    {
        return new self(self::PRE_ORDERED);
    }

    public static function ordered(): self
    {
        return new self(self::ORDERED);
    }

    public static function paid(): self
    {
        return new self(self::PAID);
    }

    public static function shipped(): self
    {
        return new self(self::SHIPPED);
    }

    public static function inCustoms(): self
    {
        return new self(self::CUSTOMS);
    }

    public static function owned(): self
    {
        return new self(self::OWNED);
    }

    public static function unavailable(): self
    {
        return new self(self::UNAVAILABLE);
    }

    public function __toString(): string
    {
        return $this->status;
    }
}
