<?php

namespace Walva\HafBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Walva\HafBundle\Entity\Article;

class LivreType extends AbstractType {

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('titre')
            ->add('langue', 'choice', array(
                'choices' => array(
                    Article::LANGUAGE_FR => 'français',
                    Article::LANGUAGE_NL => 'néerlandais'
                )
            ))

            ->add('auteur')
                ->add('nombrePages')
                ->add('iSBN')
                ->add('edition')
                ->add('prix')
                ->add('contenu')
                ->add('image', new ImageType(), array('required' => false))
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'Walva\HafBundle\Entity\Livre'
        ));
    }

    /**
     * @return string
     */
    public function getName() {
        return 'walva_hafbundle_livre';
    }

}
