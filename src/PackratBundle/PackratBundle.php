<?php

namespace PackratBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class PackratBundle extends Bundle
{
    public function getParent()
    {
        return 'FOSUserBundle';
    }
}
