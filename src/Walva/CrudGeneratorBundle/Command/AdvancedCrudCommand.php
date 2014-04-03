<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Walva\CrudGeneratorBundle\Command;

use Sensio\Bundle\GeneratorBundle\Command\GenerateDoctrineCrudCommand;
use Sensio\Bundle\GeneratorBundle\Generator\DoctrineCrudGenerator;
use Symfony\Component\HttpKernel\Bundle\BundleInterface;

/**
 * Description of AdvancedCrudCommand
 *
 * @author Benjamin Ellis
 */
class AdvancedCrudCommand extends GenerateDoctrineCrudCommand {

    //protected $generator;

    protected function configure() {
        parent::configure();

        $this->setName('walva:generate:crud');
        $this->setDescription('Advanced crud generator!');
    }
    
    protected function getSkeletonDirs(BundleInterface $bundle = null)
    {
        $skeletonDirs = array();

        var_dump($bundle->getPath().'/Resources/SensioGeneratorBundle/skeleton');
        if (isset($bundle) && is_dir($dir = $bundle->getPath().'/Resources/SensioGeneratorBundle/skeleton')) {
            $skeletonDirs[] = $dir;
        }

        if (is_dir($dir = $this->getContainer()->get('kernel')->getRootdir().'/Resources/SensioGeneratorBundle/skeleton')) {
            $skeletonDirs[] = $dir;
        }

        $skeletonDirs[] = __DIR__.'/../Resources/skeleton';
        $skeletonDirs[] = __DIR__.'/../Resources';

        var_dump($skeletonDirs);
        
        return $skeletonDirs;
    }

    /*
    protected function getGenerator(\Symfony\Component\HttpKernel\Bundle\BundleInterface $bundle = null) {
        if (null === $this->generator) {
            $this->generator =
                    new DoctrineCrudGenerator($this->getContainer()->get('filesystem'), __DIR__ . '/../Resources/skeleton/crud');
        }

        return $this->generator;
    }

    /*
      protected function getGenerator(Symfony\Component\HttpKernel\Bundle\BundleInterface $bundle = NULL)
      {
      if (null === $this->generator) {
      $this->generator = new DoctrineCrudGenerator($this->getContainer()->get('filesystem'), __DIR__.'/../Resources/skeleton/crud');
      }

      return $this->generator;
      }

      /*
      protected function createGenerator($bundle = null)
      {
      return new \Walva\CrudGeneratorBundle\Generator\DoctrineCrudGenerator($this->getContainer()->get('filesystem'));
      }
     * 
     */
}
