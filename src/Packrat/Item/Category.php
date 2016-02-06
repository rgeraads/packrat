<?php

namespace Packrat\Item;

interface Category
{
    public function match(): string;
}
