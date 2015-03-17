<?php

use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Config\Loader\LoaderInterface;

class AppKernel extends Kernel {

    public function registerBundles() {
        $bundles = array(
            new Symfony\Bundle\FrameworkBundle\FrameworkBundle(),
            new Symfony\Bundle\SecurityBundle\SecurityBundle(),
            new Symfony\Bundle\TwigBundle\TwigBundle(),
            new Symfony\Bundle\MonologBundle\MonologBundle(),
            new Symfony\Bundle\SwiftmailerBundle\SwiftmailerBundle(),
            new Symfony\Bundle\AsseticBundle\AsseticBundle(),
            new Doctrine\Bundle\DoctrineBundle\DoctrineBundle(),
            new Sensio\Bundle\FrameworkExtraBundle\SensioFrameworkExtraBundle(),
            new Walva\HafBundle\WalvaHafBundle(),
            new Stof\DoctrineExtensionsBundle\StofDoctrineExtensionsBundle(),
            new Walva\MailChimpBundle\WalvaMailChimpBundle(),
            new FOS\UserBundle\FOSUserBundle(),
            new Walva\UserBundle\WalvaUserBundle(),
            new Walva\VideoBundle\WalvaVideoBundle(),
            new Walva\CrudAdminBundle\WalvaCrudAdminBundle(),
            new Walva\AdSiteBundle\WalvaAdSiteBundle(),
//            new Braincrafted\Bundle\BootstrapBundle\BraincraftedBootstrapBundle(),
            new HAF\WebsiteBundle\HAFWebsiteBundle(),
            new HAF\CalendarBundle\HAFCalendarBundle(),
        );

        if (in_array($this->getEnvironment(), array('dev', 'test'))) {
            $bundles[] = new Symfony\Bundle\WebProfilerBundle\WebProfilerBundle();
            $bundles[] = new Sensio\Bundle\DistributionBundle\SensioDistributionBundle();
            $bundles[] = new Sensio\Bundle\GeneratorBundle\SensioGeneratorBundle();
            $bundles[] = new Walva\CrudGeneratorBundle\WalvaCrudGeneratorBundle();
            $bundles[] = new CoreSphere\ConsoleBundle\CoreSphereConsoleBundle();
            
            //$bundles[] = new CoreSphere\ConsoleBundle\CoreSphereConsoleBundle();
        }

        return $bundles;
    }

    public function registerContainerConfiguration(LoaderInterface $loader) {
        $loader->load(__DIR__ . '/config/config_' . $this->getEnvironment() . '.yml');
    }

}
