<?php

namespace PackratBundle\Form;

use PackratBundle\Entity\Item;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\FormBuilderInterface;
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
            ->add('status', ChoiceType::class, [
                'choices'           => [
                    'Not owned'       => 'not owned',
                    'To be announced' => 'to be announced',
                    'Pre-ordered'     => 'pre-ordered',
                    'Ordered'         => 'ordered',
                    'Paid'            => 'Paid',
                    'Shipped'         => 'shipped',
                    'Owned'           => 'owned',
                    'Unavailable'     => 'unavailable',
                ],
                'choices_as_values' => true,
            ])
            ->add('currency', ChoiceType::class, [
                'choices' => [
                    '€' => 'EUR',
                    '$' => 'USD',
                    '£' => 'GBP',
                    '¥' => 'JPY',
                ]
            ])
            ->add('price', MoneyType::class, [
                'required' => false
            ])
            ->add('shippingCost', MoneyType::class, [
                'required' => false
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
