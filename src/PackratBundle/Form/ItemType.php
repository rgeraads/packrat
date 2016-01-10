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
                    'not owned'       => 'not owned',
                    'to be announced' => 'to be announced',
                    'pre-ordered'     => 'pre-ordered',
                    'ordered'         => 'ordered',
                    'paid'            => 'Paid',
                    'shipped'         => 'shipped',
                    'owned'           => 'owned',
                    'unavailable'     => 'unavailable',
                ],
                'choices_as_values' => true,
            ])
            ->add('currency', ChoiceType::class, [
                'choices' => [
                    'EUR' => 'EUR',
                    'USD' => 'USD',
                    'GBP' => 'GBP',
                    'JPY' => 'JPY',
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
