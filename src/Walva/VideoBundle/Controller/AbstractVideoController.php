<?php

namespace Walva\VideoBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use \Walva\CrudAdminBundle\Controller\CrudController as Controller;

use Walva\VideoBundle\Entity\AbstractVideo;
use Walva\VideoBundle\Form\AbstractVideoType;

/**
 * AbstractVideo controller.
 *
 */
class AbstractVideoController extends Controller
{

function __construct() {
    $this->setRoutes(array(
        self::$ROUTE_INDEX_ADD => 'abstract_video_new',
        self::$ROUTE_INDEX_INDEX => 'abstract_video',
        self::$ROUTE_INDEX_DELETE => 'abstract_video_show',
        self::$ROUTE_INDEX_EDIT => 'abstract_video_edit',
        self::$ROUTE_INDEX_SHOW => 'abstract_video_show',
    ));

    $this->setLayoutPath('WalvaVideoBundle:AbstractVideo:layout.html.twig');
    $this->setIndexPath("WalvaVideoBundle:AbstractVideo:index.html.twig");
    $this->setShowPath("WalvaVideoBundle:AbstractVideo:show.html.twig");
    $this->setEditPath("WalvaVideoBundle:AbstractVideo:edit.html.twig");

    $this->setColumnsHeader(array(
        "Id",
        "Internal Name",
        ));
}

public function createEntity() {
        return new AbstractVideo();
    }

public function getRepository() {
        $em = $this->getDoctrine()->getManager();
        return $em->getRepository('WalvaVideoBundle:AbstractVideo');
    }

    /**
     * Lists all AbstractVideo entities.
     *
     */
    public function indexAction()
    {
        return parent::indexAction();

    }
    /**
     * Creates a new AbstractVideo entity.
     *
     */
    public function createAction(Request $request)
    {
        return parent::createAction($request);

    }

    /**
    * Creates a form to create a AbstractVideo entity.
    *
    * @param AbstractVideo $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    public function createCreateForm(AbstractVideo $entity)
    {
        $form = $this->createForm(new AbstractVideoType(), $entity, array(
            'action' => $this->generateUrl('abstract_video_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new AbstractVideo entity.
     *
     */
    public function newAction()
    {
        return parent::newAction();

    }

    /**
     * Finds and displays a AbstractVideo entity.
     *
     */
    public function showAction($id)
    {
        return parent::showAction($id);

    }

    /**
     * Displays a form to edit an existing AbstractVideo entity.
     *
     */
    public function editAction($id)
    {
        return parent::editAction($id);

    }

    /**
    * Creates a form to edit a AbstractVideo entity.
    *
    * @param AbstractVideo $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    public function createEditForm(AbstractVideo $entity)
    {
        $form = $this->createForm(new AbstractVideoType(), $entity, array(
            'action' => $this->generateUrl('abstract_video_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing AbstractVideo entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        return parent::updateAction($request, $id);

    }
    /**
     * Deletes a AbstractVideo entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
return parent::deleteAction($request, $id);

    }

    /**
     * Creates a form to delete a AbstractVideo entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    public function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('abstract_video_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
