<?php

namespace Walva\MailChimpBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('WalvaMailChimpBundle:Default:index.html.twig', array('name' => $name));
    }
}
