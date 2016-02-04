<?php

namespace Packrat\Item;

final class ImageWasAddedToItem
{
    private $image;

    public function __construct(Image $image)
    {
        $this->image = $image;
    }

    public function getImage(): Image
    {
        return $this->image;
    }
}
