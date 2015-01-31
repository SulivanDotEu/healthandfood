<?php

namespace Walva\HafBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Walva\HafBundle\Entity\Article;
use Walva\HafBundle\Entity\Image;

class ArticleType extends AbstractType {

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('dateCreation', 'date', array(
                    'years' => range(1990, 2030)
                ))
                ->add('langue', 'choice', array(
                    'choices' => array(
                        Article::LANGUAGE_FR => 'français',
                        Article::LANGUAGE_NL => 'néerlandais'
                    )
                ))
                ->add('titre')
                ->add('resume')
                ->add('contenu')
                ->add('auteur')
                ->add('categorie')
                ->add('tag', 'entity', array(
                    'class' => 'WalvaHafBundle:Tag',
                    'multiple' => 'true',
                    'required' => false
                ))
                ->add('reference', 'entity', array(
                    'class' => 'WalvaHafBundle:Reference',
                    'multiple' => 'true',
                    'required' => false
                ))
                ->add('image', new ImageType(), array('required' => false))
                ->add('videos', 'entity', array(
                    'class' => 'WalvaVideoBundle:AbstractVideo',
                    'multiple' => 'true',
                    'required' => false
                ))
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'Walva\HafBundle\Entity\Article'
        ));
    }

    /**
     * @return string
     */
    public function getName() {
        return 'walva_hafbundle_article';
    }

}
