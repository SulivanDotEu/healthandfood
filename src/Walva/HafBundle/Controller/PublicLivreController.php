<?php

namespace Walva\HafBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Walva\HafBundle\Entity\Livre;
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
   public function indexAction($page = 1, $nombre = 10) {
      $em = $this->getDoctrine()->getManager();

      $entities = $em->getRepository('WalvaHafBundle:Livre')->findAll();

      $em = $this->getDoctrine()->getManager();

      $qb = $em->createQueryBuilder();
      $qb->select('count(a.id)');
      $qb->from('WalvaHafBundle:Livre', 'a');

      $pageCount = ceil($qb->getQuery()->getSingleScalarResult() / $nombre);
      if (($page + 1) > $pageCount)
         $next = false;
      else
         $next = true;

      return $this->render('WalvaHafBundle:Livre:public/index.html.twig', array(
                  'entities' => $entities,
                  'page' => $page,
                  'next' => $next,
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
