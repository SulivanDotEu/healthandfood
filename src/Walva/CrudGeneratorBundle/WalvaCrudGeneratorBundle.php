<?php

namespace Walva\CrudGeneratorBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class WalvaCrudGeneratorBundle extends Bundle
{
    public function getParent() {
        return 'SensioGeneratorBundle';
    }
}
