<?php

namespace PackratBundle\Controller;

use Money\Currency;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ExchangeRateController extends Controller
{
    public function addAction(Currency $currency)
    {
        $em = $this->getDoctrine()->getManager();

        $em->getRepository('PackratBundle:ExchangeRate')->addOrRefresh($currency);

        return $this->redirect('PackratBundle:Item:index.html.twig');
    }

    public function addAllAction()
    {
        $em = $this->getDoctrine()->getManager();

        $em->getRepository('PackratBundle:ExchangeRate')->addAll();

        return $this->redirect('PackratBundle:Item:index.html.twig');
    }

    public function refreshAction(Currency $currency)
    {
        $em = $this->getDoctrine()->getManager();

        $em->getRepository('PackratBundle:ExchangeRate')->refresh($currency);

        return $this->redirect('PackratBundle:Item:index.html.twig');
    }

    public function refreshAllAction()
    {
        $em = $this->getDoctrine()->getManager();

        $exchangeRates = $em->getRepository('PackratBundle:ExchangeRate')->findAll();

        foreach ($exchangeRates as $exchangeRate) {
            $em->getRepository('PackratBundle:ExchangeRate')->refreshAll($exchangeRate->getCurrency());
        }

        return $this->redirect('PackratBundle:Item:index.html.twig');
    }
}
