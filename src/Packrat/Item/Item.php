<?php

namespace Packrat\Item;

use Broadway\EventSourcing\EventSourcedAggregateRoot;
use Money\Money;
use Packrat\Collection\Id;

final class Item extends EventSourcedAggregateRoot
{
    private $id;
    private $name;

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

    private function initialize(Id $id, Name $name)
    {
        $this->id   = $id;
        $this->name = $name;
    }

    public function getAggregateRootId(): Id
    {
        return $this->id;
    }

    public static function create(Id $id, Name $itemName)
    {
        $item = new Item();

        $item->apply(new ItemWasCreated($id, $itemName));
    }

    public function addImage(Image $image)
    {
        $item = new Item();

        $item->apply(new ImageWasAddedToItem($image));
    }

    public function removeImage(Image $image)
    {
        $item = new Item();

        $item->apply(new ImageWasRemovedFromItem($image));
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

    public function addPrice(Money $price)
    {
        $item = new Item();

        $item->apply(new PriceWasAddedToItem($price));
    }

    public function updatePrice(Money $price)
    {
        $item = new Item();

        $item->apply(new PriceOfItemWasUpdated($price));
    }

    public function addShippingCosts(Money $price)
    {
        $item = new Item();

        $item->apply(new ShippingCostsWereAddedToItem($price));
    }

    public function updateShippingCosts(Money $price)
    {
        $item = new Item();

        $item->apply(new ShippingCostsOfItemWereUpdated($price));
    }

    protected function applyItemWasCreated(ItemWasCreated $event)
    {
        $this->initialize(
            $event->getItemId(),
            $event->getItemName()
        );
    }

    protected function applyImageWasAddedToItem(ImageWasAddedToItem $event)
    {
        $this->images[] = $event->getImage();
    }

    protected function applyImageWasRemovedFromItem(ImageWasRemovedFromItem $event)
    {
        foreach ($this->images as $key => $image) {
            if ($image->getId() === $event->getImage()->getId()) {
                unset($this->images[$key]);
            }
        }
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
