<?php

namespace Packrat\Item;

use Broadway\EventSourcing\EventSourcedAggregateRoot;

final class Item extends EventSourcedAggregateRoot
{
    private $itemId;
    private $itemName;

    /**
     * @var Image[]
     */
    private $images;
    private $status;
    private $price;
    private $shippingCosts;
    private $notes;

    private function __construct()
    {
    }

    private function initialize(
        ItemId $itemId,
        ItemName $itemName,
        Status $status,
        Price $price,
        ShippingCosts $shippingCosts,
        Notes $notes
    ) {
        $this->itemId        = $itemId;
        $this->itemName      = $itemName;
        $this->status        = $status;
        $this->price         = $price;
        $this->shippingCosts = $shippingCosts;
        $this->notes         = $notes;
    }

    public function getAggregateRootId(): ItemId
    {
        return $this->itemId;
    }

    public static function create(
        ItemId $itemId,
        ItemName $itemName,
        Status $status,
        Price $price,
        ShippingCosts $shippingCosts,
        Notes $notes
    ) {
        $item = new Item();

        $item->apply(new ItemWasCreated($itemId, $itemName, $status, $price, $shippingCosts, $notes));
    }

    public function addImage(Image $image)
    {
        $item = new Item();

        $item->apply(new ImageWasAddedToItem($image));
    }

    public function removeImage(Image $image)
    {
        $item = new Item();

        foreach ($item->images as $value) {
            if ($value->getImageId() === $image->getImageId()) {
                $item->apply(new ImageWasRemovedFromItem($image));
            }
        }
    }

    public function addStatus(Status $status)
    {
        $item = new Item();

        $item->apply(new StatusWasAddedToItem($status));
    }

    public function updateStatus(Status $status)
    {
        $item = new Item();

        $item->apply(new StatusOfItemWasUpdated($status));
    }

    public function addPrice(Price $price)
    {
        $item = new Item();

        $item->apply(new PriceWasAddedToItem($price));
    }

    public function updatePrice(Price $price)
    {
        $item = new Item();

        $item->apply(new PriceOfItemWasUpdated($price));
    }

    public function addShippingCosts(ShippingCosts $price)
    {
        $item = new Item();

        $item->apply(new ShippingCostsWereAddedToItem($price));
    }

    public function updateShippingCosts(ShippingCosts $price)
    {
        $item = new Item();

        $item->apply(new ShippingCostsOfItemWereUpdated($price));
    }

    protected function applyItemWasCreated(ItemWasCreated $event)
    {
        $this->initialize(
            $event->getId(),
            $event->getName(),
            $event->getStatus(),
            $event->getPrice(),
            $event->getShippingCosts(),
            $event->getNotes()
        );
    }

    protected function applyImageWasAddedToItem(ImageWasAddedToItem $event)
    {
        $imageId                = (string) $event->getImage()->getImageId();
        $this->images[$imageId] = $event->getImage();
    }

    protected function applyImageWasRemovedFromItem(ImageWasRemovedFromItem $event)
    {
        $imageId = (string) $event->getImage()->getImageId();
        unset($this->images[$imageId]);
    }

    protected function applyStatusWasAddedToItem(StatusWasAddedToItem $event)
    {
        $this->status = $event->getStatus();
    }

    protected function applyStatusOfItemWasUpdated(StatusOfItemWasUpdated $event)
    {
        $this->status = $event->getStatus();
    }

    protected function applyPriceWasAddedToItem(PriceWasAddedToItem $event)
    {
        $this->price = $event->getPrice();
    }

    protected function applyPriceOfItemWasUpdated(PriceOfItemWasUpdated $event)
    {
        $this->price = $event->getPrice();
    }

    protected function applyShippingCostsWereAddedToItem(ShippingCostsWereAddedToItem $event)
    {
        $this->shippingCosts = $event->getShippingCosts();
    }

    protected function applyShippingCostsOfItemWereUpdated(ShippingCostsOfItemWereUpdated $event)
    {
        $this->shippingCosts = $event->getShippingCosts();
    }
}
