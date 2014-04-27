<?php

use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;

$collection = new RouteCollection();

$collection->add('walva_crud_generator_homepage', new Route('/hello/{name}', array(
    '_controller' => 'WalvaCrudGeneratorBundle:Default:index',
)));

return $collection;
