<?php

namespace Walva\HafBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Walva\HafBundle\Entity\Categorie;
use Walva\HafBundle\Form\CategorieType;

/**
 * Categorie controller.
 *
 */
class PublicCategorieController extends Controller {

    public function menuAction() {
        $repository = $this->getDoctrine()->getManager()->getRepository('WalvaHafBundle:Categorie');
        $entities = $repository->findAll();
        return $this->render('WalvaHafBundle:Categorie:public\menu.html.twig', array(
                    'entities' => $entities
                ));
    }

    /**
     * Lists all Categorie entities.
     *
     */
    public function indexAction() {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('WalvaHafBundle:Categorie')->findAll();

        return $this->render('WalvaHafBundle:Categorie:index.html.twig', array(
                    'entities' => $entities,
                ));
    }

    /**
     * Finds and displays a Categorie entity.
     *
     */
    public function showAction($id) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('WalvaHafBundle:Categorie')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Categorie entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('WalvaHafBundle:Categorie:show.html.twig', array(
                    'entity' => $entity,
                    'delete_form' => $deleteForm->createView(),));
    }

}
