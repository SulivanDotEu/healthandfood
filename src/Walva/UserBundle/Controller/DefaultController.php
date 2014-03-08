<?php

namespace Walva\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('WalvaUserBundle:Default:index.html.twig', array('name' => $name));
    }
}
