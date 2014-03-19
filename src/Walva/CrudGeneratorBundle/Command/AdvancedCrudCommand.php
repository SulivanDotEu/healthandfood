<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Walva\CrudGeneratorBundle\Command;

use Sensio\Bundle\GeneratorBundle\Command\GenerateDoctrineCrudCommand;
use Sensio\Bundle\GeneratorBundle\Generator\DoctrineCrudGenerator;

/**
 * Description of AdvancedCrudCommand
 *
 * @author Benjamin Ellis
 */
class AdvancedCrudCommand extends GenerateDoctrineCrudCommand{
    
    protected $generator;
 
    protected function configure()
    {
        parent::configure();
 
        $this->setName('walva:generate:crud');
        $this->setDescription('Advanced crud generator!');
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
