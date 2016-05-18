<?php

namespace PackratBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;

/**
 * Item
 */
class Item
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $url;

    /**
     * @var string
     *
     * @Assert\Image
     */
    private $imageLocation;

    /**
     * @var string
     */
    private $status;

    /**
     * @var string
     */
    private $currency;

    /**
     * @var float
     */
    private $price;

    /**
     * @var float
     */
    private $priceInEuro;

    /**
     * @var float
     */
    private $shippingCost;

    /**
     * @var float
     */
    private $shippingCostInEuro;

    /**
     * @var string
     */
    private $notes;

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
     * Set name
     *
     * @param string $name
     *
     * @return Item
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set url
     *
     * @param string $url
     *
     * @return Item
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get url
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param string $imageLocation
     *
     * @return Item
     */
    public function setImageLocation($imageLocation)
    {
        $this->imageLocation = $imageLocation;

        return $this;
    }

    /**
     * @return string
     */
    public function getImageLocation()
    {
        return $this->imageLocation;
    }

    /**
     * Set status
     *
     * @param string $status
     *
     * @return Item
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set currency
     *
     * @param string $currency
     *
     * @return Item
     */
    public function setCurrency($currency)
    {
        $this->currency = $currency;

        return $this;
    }

    /**
     * Get currency
     *
     * @return string
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * Set price
     *
     * @param float $price
     *
     * @return Item
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return float
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set shippingCost
     *
     * @param float $shippingCost
     *
     * @return Item
     */
    public function setShippingCost($shippingCost)
    {
        $this->shippingCost = $shippingCost;

        return $this;
    }

    /**
     * Get shippingCost
     *
     * @return float
     */
    public function getShippingCost()
    {
        return $this->shippingCost;
    }

    /**
     * Set notes
     *
     * @param string $notes
     *
     * @return Item
     */
    public function setNotes($notes)
    {
        $this->notes = $notes;

        return $this;
    }

    /**
     * Get notes
     *
     * @return string
     */
    public function getNotes()
    {
        return $this->notes;
    }

    /**
     * @return float
     */
    public function getPriceInEuro()
    {
        return $this->priceInEuro;
    }

    /**
     * @param float $priceInEuro
     */
    public function setPriceInEuro($priceInEuro)
    {
        $this->priceInEuro = $priceInEuro;
    }

    /**
     * @return float
     */
    public function getShippingCostInEuro()
    {
        return $this->shippingCostInEuro;
    }

    /**
     * @param float $shippingCostInEuro
     */
    public function setShippingCostInEuro($shippingCostInEuro)
    {
        $this->shippingCostInEuro = $shippingCostInEuro;
    }
}
