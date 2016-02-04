<?php

namespace Packrat\Item;

final class ImageWasRemovedFromItem
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
