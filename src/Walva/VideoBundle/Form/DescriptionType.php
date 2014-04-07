<?php

namespace Walva\VideoBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class DescriptionType extends AbstractType {

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('language', 'choice', array(
                    'choices' => array(
                        'fr' => 'français',
                        'nl' => 'néerlandais'
                    )
                ))
                ->add('name')
                ->add('description')
                ->add('video')
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'Walva\VideoBundle\Entity\Description'
        ));
    }

    /**
     * @return string
     */
    public function getName() {
        return 'walva_videobundle_description';
    }

}
