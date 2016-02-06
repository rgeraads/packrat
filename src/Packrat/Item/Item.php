<?php

namespace Packrat\Item;

use Broadway\EventSourcing\EventSourcedAggregateRoot;

final class Item extends EventSourcedAggregateRoot
{
    private $itemId;
    private $name;
    private $category;

    /**
     * @var Image[]
     */
    private $images;
    private $status;
    private $price;
    private $shippingCosts;

    private function __construct()
    {
    }

    private function initialize(ItemId $itemId, ItemName $name, Category $category)
    {
        $this->itemId   = $itemId;
        $this->name     = $name;
        $this->category = $category;
    }

    public function getAggregateRootId(): ItemId
    {
        return $this->itemId;
    }

    public static function create(ItemId $itemId, ItemName $name, Category $category): Item
    {
        $item = new Item();

        $item->apply(new ItemWasCreated($itemId, $name, $category));

        return $item;
    }

    public function addImage(Image $image)
    {
        $this->apply(new ImageWasAddedToItem($image));
    }

    public function removeImage(Image $image)
    {
        foreach ($this->images as $value) {
            if ($value->getId() === $image->getId()) {
                $this->apply(new ImageWasRemovedFromItem($image));
            }
        }
    }

    public function addStatus(Status $status)
    {
        $this->apply(new StatusWasAddedToItem($status));
    }

    public function updateStatus(Status $status)
    {
        $this->apply(new StatusOfItemWasUpdated($status));
    }

    public function addPrice(Price $price)
    {
        $this->apply(new PriceWasAddedToItem($price));
    }

    public function updatePrice(Price $price)
    {
        $this->apply(new PriceOfItemWasUpdated($price));
    }

    public function addShippingCosts(ShippingCosts $price)
    {
        $this->apply(new ShippingCostsWereAddedToItem($price));
    }

    public function updateShippingCosts(ShippingCosts $price)
    {
        $this->apply(new ShippingCostsOfItemWereUpdated($price));
    }

    protected function applyItemWasCreated(ItemWasCreated $event)
    {
        $this->initialize($event->getId(), $event->getName(), $event->getCategory());
    }

    protected function applyImageWasAddedToItem(ImageWasAddedToItem $event)
    {
        $imageId                = (string) $event->getImage()->getId();
        $this->images[$imageId] = $event->getImage();
    }

    protected function applyImageWasRemovedFromItem(ImageWasRemovedFromItem $event)
    {
        $imageId = (string) $event->getImage()->getId();
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
