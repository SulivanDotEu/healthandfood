<?php

namespace Walva\HafBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use \Walva\CrudAdminBundle\Controller\CrudController as Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Walva\HafBundle\Entity\Spotlight;
use Walva\HafBundle\Form\SpotlightType;

/**
 * Spotlight controller.
 *
 * @Route("/spotlight")
 */
class SpotlightController extends Controller
{

function __construct() {
    $this->setRoutes(array(
        self::$ROUTE_INDEX_ADD => 'spotlight_new',
        self::$ROUTE_INDEX_INDEX => 'spotlight',
        self::$ROUTE_INDEX_DELETE => 'spotlight_show',
        self::$ROUTE_INDEX_EDIT => 'spotlight_edit',
        self::$ROUTE_INDEX_SHOW => 'spotlight_show',
    ));

    $this->setLayoutPath('WalvaHafBundle:Spotlight:layout.html.twig');
    $this->setIndexPath("WalvaHafBundle:Spotlight:index.html.twig");
    $this->setShowPath("WalvaHafBundle:Spotlight:show.html.twig");
    $this->setEditPath("WalvaHafBundle:Spotlight:edit.html.twig");

    $this->setColumnsHeader(array(
        "Id",
        ));
}

public function createEntity() {
        return new Spotlight();
    }

public function getRepository() {
        $em = $this->getDoctrine()->getManager();
        return $em->getRepository('WalvaHafBundle:Spotlight');
    }

    /**
     * Lists all Spotlight entities.
     *
     * @Route("/", name="spotlight")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        return parent::indexAction();

    }
    /**
     * Creates a new Spotlight entity.
     *
     * @Route("/", name="spotlight_create")
     * @Method("POST")
     * @Template("WalvaHafBundle:Spotlight:new.html.twig")
     */
    public function createAction(Request $request)
    {
        return parent::createAction($request);

    }

    /**
    * Creates a form to create a Spotlight entity.
    *
    * @param Spotlight $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    public function createCreateForm(Spotlight $entity)
    {
        $form = $this->createForm(new SpotlightType(), $entity, array(
            'action' => $this->generateUrl('spotlight_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Spotlight entity.
     *
     * @Route("/new", name="spotlight_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        return parent::newAction();

    }

    /**
     * Finds and displays a Spotlight entity.
     *
     * @Route("/{id}", name="spotlight_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        return parent::showAction($id);

    }

    /**
     * Displays a form to edit an existing Spotlight entity.
     *
     * @Route("/{id}/edit", name="spotlight_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        return parent::editAction($id);

    }

    /**
    * Creates a form to edit a Spotlight entity.
    *
    * @param Spotlight $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    public function createEditForm(Spotlight $entity)
    {
        $form = $this->createForm(new SpotlightType(), $entity, array(
            'action' => $this->generateUrl('spotlight_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Spotlight entity.
     *
     * @Route("/{id}", name="spotlight_update")
     * @Method("PUT")
     * @Template("WalvaHafBundle:Spotlight:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        return parent::updateAction($request, $id);

    }
    /**
     * Deletes a Spotlight entity.
     *
     * @Route("/{id}", name="spotlight_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
return parent::deleteAction($request, $id);

    }

    /**
     * Creates a form to delete a Spotlight entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    public function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('spotlight_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
