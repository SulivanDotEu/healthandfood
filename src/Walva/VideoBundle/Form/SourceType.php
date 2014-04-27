<?php

namespace Walva\VideoBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class SourceType extends AbstractType {
    
    private $videoFinder;

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('type', 'choice', array(
                    'choices' => array(
                        'mp4' => 'mp4',
                        'ogv' => 'ogv',
                        'webm' => 'webm'
                    )
                ))
                ->add('path', 'choice', array(
                    'choices' => $this->getVideoFinder()->getAllVideosHosted()
                ))
                ->add('audioLanguage', 'choice', array(
                    'choices' => array(
                        'fr' => 'français',
                        'nl' => 'néerlandais'
                    )
                ))
                ->add('subtitlesLanguage', 'choice', array(
                    'choices' => array(
                        'fr' => 'français',
                        'nl' => 'néerlandais'
            )))
                ->add('video')
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'Walva\VideoBundle\Entity\Source'
        ));
    }

    /**
     * @return string
     */
    public function getName() {
        return 'walva_videobundle_source';
    }

    
    public function getVideoFinder() {
        return $this->videoFinder;
    }

    public function setVideoFinder($videoFinder) {
        $this->videoFinder = $videoFinder;
    }


}
