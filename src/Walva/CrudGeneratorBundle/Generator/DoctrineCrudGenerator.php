<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Walva\CrudGeneratorBundle\Generator;

use Sensio\Bundle\GeneratorBundle\Generator\DoctrineCrudGenerator as BaseGenerator;

class DoctrineCrudGenerator extends BaseGenerator
{
    public function __construct(\Symfony\Component\Filesystem\Filesystem $filesystem) {
        parent::__construct($filesystem);
    }
    
    
}
