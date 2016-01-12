<?php

namespace PackratBundle\ParamConverter;

use Money\Currency;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Request\ParamConverter\ParamConverterInterface;
use Symfony\Component\HttpFoundation\Request;

class CurrencyConverter implements ParamConverterInterface
{
    public function apply(Request $request, ParamConverter $configuration)
    {
        $currency = new Currency(
            strtoupper($request->attributes->get($configuration->getName()))
        );

        $request->attributes->set(
            $configuration->getName(),
            $currency
        );

        return true;
    }

    public function supports(ParamConverter $configuration)
    {
        return $configuration->getClass() === Currency::class;
    }
}
