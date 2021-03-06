<?php

namespace HAF\CalendarBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CategoryType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('internalName')
            ->add('color', 'choice', [
                "choices" => [
                    "default" => "gray",
                    "primary" => "blue",
                    "info"    => "light blue",
                    "warning" => " orange",
                    "danger"  => "red",
                    "success" => "green",
                ]

            ]);
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'HAF\CalendarBundle\Entity\Category'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'haf_calendarbundle_category';
    }
}
