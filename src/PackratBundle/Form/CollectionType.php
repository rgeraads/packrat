<?php

namespace PackratBundle\Form;

use PackratBundle\Entity\Collection;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CollectionType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('item')
            ->add('url', UrlType::class)
            ->add('status', ChoiceType::class, [
                'choices'           => [
                    'not owned'   => 'not owned',
                    'pre-ordered' => 'pre-ordered',
                    'ordered'     => 'Ordered',
                    'paid'        => 'Paid',
                    'shipped'     => 'shipped',
                    'owned'       => 'owned',
                    'unavailable' => 'unavailable',
                ],
                'choices_as_values' => true,
            ])
            ->add('currency')
            ->add('price', MoneyType::class)
            ->add('shippingCost', MoneyType::class)
            ->add('notes');
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Collection::class
        ]);
    }
}
