<?php

namespace Walva\HafBundle\Controller;

use HAF\WebsiteBundle\Helper\PaginationHelper;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Walva\HafBundle\Entity\Livre;
use Walva\HafBundle\Entity\LivreRepository;
use Walva\HafBundle\Form\LivreType;

/**
 * Livre controller.
 *
 */
class PublicLivreController extends Controller {

   public function menuAction($nombre) {
      $repository = $this->getDoctrine()->getManager()->getRepository('WalvaHafBundle:Livre');
      $entities = $repository->findBy(
              array(), array('dateCreation' => 'desc'), // On tri par date dÃ©croissante
              $nombre, // On sÃ©lectionne $nombre articles
              0 // A partir du premier
      );
      return $this->render('WalvaHafBundle:Livre:public\menu.html.twig', array(
                  'entities' => $entities
              ));
   }

   /**
    * Lists all Livre entities.
    *
    */
   public function indexAction(Request $request, $page = 1, $itemPerPage = 10)
   {
       $locale = $request->getLocale();
       $repository = $this->getDoctrine()->getManager()->getRepository('WalvaHafBundle:Livre');
       /** @var LivreRepository $repository */
       $entities = $repository->findByLanguagePagined($locale, $page, $itemPerPage);

//        $entities = $em->getRepository('WalvaHafBundle:Livre')->findAll();
       $paginationViewVars = PaginationHelper::createPaginatorViewVars(
           $entities, $page, "livre_public", $itemPerPage
       );

       return $this->render('WalvaHafBundle:Livre:public\index.html.twig', array(
           'entities' => $entities,
           'pagination' => $paginationViewVars

       ));
   }

   /**
    * Finds and displays a Article entity.
    *
    */
   public function showAction($id) {
      $em = $this->getDoctrine()->getManager();

      $entity = $em->getRepository('WalvaHafBundle:Livre')->find($id);

      if (!$entity) {
         throw $this->createNotFoundException('Unable to find Livre entity.');
      }

      return $this->render('WalvaHafBundle:Livre:public/show.html.twig', array(
                  'entity' => $entity,));
   }

}
