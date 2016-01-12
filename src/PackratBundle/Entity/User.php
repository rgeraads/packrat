<?php

namespace PackratBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;

final class User extends BaseUser
{
    protected $id;

    public function __construct()
    {
        parent::__construct();
    }
}
