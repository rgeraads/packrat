<?php

namespace PackratBundle\Entity;

/**
 * ExchangeRate
 */
class ExchangeRate
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $currency;

    /**
     * @var float
     */
    private $toEur;

    /**
     * @var string
     */
    private $lastUpdated;

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $currency
     *
     * @return ExchangeRate
     */
    public function setCurrency($currency)
    {
        $this->currency = strtoupper($currency);

        return $this;
    }

    /**
     * @return string
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * Set toEur
     *
     * @param float $toEur
     *
     * @return ExchangeRate
     */
    public function setToEur($toEur)
    {
        $this->toEur = $toEur;

        return $this;
    }

    /**
     * Get toEur
     *
     * @return float
     */
    public function getToEur()
    {
        return $this->toEur;
    }

    /**
     * @param string $lastUpdated
     *
     * @return ExchangeRate
     */
    public function setLastUpdated($lastUpdated)
    {
        $this->lastUpdated = $lastUpdated;

        return $this;
    }

    /**
     * @return string
     */
    public function getLastUpdated()
    {
        return $this->lastUpdated;
    }
}
