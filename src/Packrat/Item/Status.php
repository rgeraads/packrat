<?php

namespace Packrat\Item;

use Assert\Assertion as Assert;

final class Status
{
    const NOT_OWNED       = 'Not owned';
    const TO_BE_ANNOUNCED = 'To be announced';
    const PRE_ORDERED     = 'Pre-ordered';
    const ORDERED         = 'Ordered';
    const PAID            = 'Paid';
    const SHIPPED         = 'Shipped';
    const CUSTOMS         = 'Customs';
    const OWNED           = 'Owned';
    const UNAVAILABLE     = 'Unavailable';
    const CANCELLED       = 'Cancelled';
    const UNKNOWN         = 'Unknown';

    const AVAILABLE_STATUSES = [
        self::NOT_OWNED,
        self::TO_BE_ANNOUNCED,
        self::PRE_ORDERED,
        self::ORDERED,
        self::PAID,
        self::SHIPPED,
        self::CUSTOMS,
        self::OWNED,
        self::UNAVAILABLE,
        self::CANCELLED,
        self::UNKNOWN,
    ];

    private $status;

    private function __construct(string $status)
    {
        $this->guardStatusExists($status);

        $this->status = $status;
    }

    public static function notOwned(): self
    {
        return new self(self::NOT_OWNED);
    }

    public static function toBeAnnounced(): self
    {
        return new self(self::TO_BE_ANNOUNCED);
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

    public static function cancelled(): self
    {
        return new self(self::CANCELLED);
    }

    public static function unknown(): self
    {
        return new self(self::UNKNOWN);
    }

    public function __toString(): string
    {
        return $this->status;
    }

    private function guardStatusExists(string $status)
    {
        Assert::inArray($status, self::AVAILABLE_STATUSES);
    }
}
