<?php

namespace PackratBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('PackratBundle:Default:index.html.twig');
    }
}
