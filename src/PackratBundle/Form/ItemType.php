<?php

namespace PackratBundle\Form;

use Money\Currency;
use Packrat\Item\Status;
use PackratBundle\Entity\Item;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ItemType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('url', UrlType::class)
            ->add('imageLocation', FileType::class, [
                'data_class' => null,
                'required'   => false,
            ])
            ->add('status', ChoiceType::class, [
                'choices' => array_combine(Status::AVAILABLE_STATUSES, Status::AVAILABLE_STATUSES),
            ])
            ->add('currency', ChoiceType::class, [
                'choices'           => array_flip(Currency::getCurrencies()),
                'preferred_choices' => ['EUR', 'GBP', 'JPY', 'USD'],
            ])
            ->add('price', MoneyType::class, [
                'required' => false,
            ])
            ->add('shippingCost', MoneyType::class, [
                'required' => false,
            ])
            ->add('notes');
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Item::class
        ]);
    }
}
