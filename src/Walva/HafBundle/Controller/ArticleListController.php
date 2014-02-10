<?php

namespace Walva\HafBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Walva\HafBundle\Entity\Article;
use Walva\HafBundle\Form\ArticleType;
use Symfony\Component\HttpFoundation\Session\Session;
use Walva\HafBundle\Entity\Categorie;
use Walva\HafBundle\Entity\Tag;
use Walva\HafBundle\View\ListView;

/**
 * Article controller.
 *
 */
class ArticleListController extends Controller {

    public $nombreArticleParPage = 10;
    /**
     * {value}/{page}
     * 
     * 
     * @param type $value
     */
    public function searchAction($value = null, $page = 1) {
        if($value == null) $value = $this->getRequest ()->get ('value'); 
        $request = $this->getRequest();
        $locale = $request->getLocale();
        
        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('WalvaHafBundle:Article');

        $entities = $repository->searchWith($locale, $page, $this->getElementByPage(), $value);
        
        $listView = new ListView();
        $listView->setData($entities);
        $listView->setDelegate($this);
        $listView->setCurrentPage($page);
        
        
        //$this->generateUrl($route, $listView);
        //$listView
        
        return $this->render('WalvaHafBundle:List:list.html.twig', array(
            'view' => $listView,
        ));
         
         
    }
    
    public function getElementByPage(){
        return $this->nombreArticleParPage;
    }
    
    public function getPage(){
        return $this->getRequest()->get('page');
    }
    
    public function generateUrlForPage($page){
        return $this->generateUrl($this->getRoute(), array(
            "value" => $this->getRequest()->get('value'),
            "page" => $page,
        ));
    }


    public function getRoute(){
        return $this->getRequest()->get('_route');
    }

}
