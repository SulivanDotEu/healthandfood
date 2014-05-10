<?php

use Doctrine\Common\Annotations\AnnotationRegistry;
use Composer\Autoload\ClassLoader;


//require_once(__DIR__ . '/../vendor/symfony/symfony/src/Symfony/Component/ClassLoader/UniversalClassLoader.php');
//
//use Symfony\Component\ClassLoader\UniversalClassLoader;
//
//$loader = new UniversalClassLoader();
//$loader->registerNamespaces(array(
//    'Walva\\CrudGeneratorBundle' => __DIR__.'/../src/vendor/walva/CrudGeneratorBundle',
//));
//
//$loader->register();
/**
 * @var ClassLoader $loader
 */



require_once __DIR__."/../vendor/symfony/symfony/src/Symfony/Component/ClassLoader/UniversalClassLoader.php";
use Symfony\Component\ClassLoader\UniversalClassLoader;
 
$loader = new UniversalClassLoader();
$loader->registerNamespace("Walva", __DIR__.'/../src/vendor/');
$loader->register();













$loader = require __DIR__.'/../vendor/autoload.php';


//$loader->add('Walva\\CrudGeneratorBundle', __DIR__.'/../src/vendor/walva/CrudGeneratorBundle');
/*
$loader->registerNamespaces(array(
    'Walva\\CrudGeneratorBundle' => __DIR__.'/../src/vendor/walva/CrudGeneratorBundle',
    ));
*/
AnnotationRegistry::registerLoader(array($loader, 'loadClass'));


return $loader;
