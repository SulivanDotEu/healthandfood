<?php

namespace Walva\CrudGeneratorBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;
use Symfony\Component\Console\Application;
use Sensio\Bundle\GeneratorBundle\Generator\DoctrineCrudGenerator;
use Symfony\Component\Filesystem\Filesystem;

class WalvaCrudGeneratorBundle extends Bundle {

    public function getParent() {
        return 'SensioGeneratorBundle';
    }

    /*
    public function registerCommands(Application $application) {
        $crudCommand = $application->get('generate:doctrine:crud');
        $generator = new DoctrineCrudGenerator(new Filesystem, __DIR__ . '/Resources/skeleton/crud');
        $crudCommand->setGenerator($generator);

        parent::registerCommands($application);
    }
     * 
     */

}
