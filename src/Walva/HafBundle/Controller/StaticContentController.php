<?php

namespace Walva\HafBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Session\Session;

/**
 * Article controller.
 *
 */
class StaticContentController extends Controller {

    public function ArticleEtNouvellesAction($langue = 'fr') {
        return $this->render('WalvaHafBundle:Static:articles_et_nouvelles.html.twig',
                array());
    }
    
    public function ContactAction($langue = 'fr') {
        return $this->render('WalvaHafBundle:Static:contact.html.twig',
                array());
    }

}
