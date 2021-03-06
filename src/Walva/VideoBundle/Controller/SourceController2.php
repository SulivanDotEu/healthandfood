<?php

namespace Walva\VideoBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use \Walva\CrudAdminBundle\Controller\CrudController as Controller;

use Walva\VideoBundle\Entity\Source;
use Walva\VideoBundle\Form\SourceType;

/**
 * Source controller.
 *
 */
class SourceController extends Controller
{function __construct() {
    $this->setRoutes(array(
        self::$ROUTE_INDEX_ADD => 'internalvideo_new',
        self::$ROUTE_INDEX_INDEX => 'internalvideo',
        self::$ROUTE_INDEX_DELETE => 'internalvideo_show',
        self::$ROUTE_INDEX_EDIT => 'internalvideo_edit',
        self::$ROUTE_INDEX_SHOW => 'internalvideo_show',
    ));

    //$this->setRouteAdd('parking_new');
    //$this->setRouteIndex('parking');

    $this->setLayoutPath('WalvaVideoBundle:InternalVideo:layout.html.twig');
    $this->setIndexPath("WalvaVideoBundle:InternalVideo:index.html.twig");
    $this->setShowPath("WalvaVideoBundle:InternalVideo:show.html.twig");
    $this->setEditPath("WalvaVideoBundle:InternalVideo:edit.html.twig");

    $this->setColumnsHeader(array(
        "Id",
        "Internal Name",
        ));
}

    /**
     * Lists all Source entities.
     *
     */
    public function indexAction()
    {
        return parent::createAction($request);

    }
    /**
     * Creates a new Source entity.
     *
     */
    public function createAction(Request $request)
    {
        return parent::createAction($request);

    }

    /**
    * Creates a form to create a Source entity.
    *
    * @param Source $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Source $entity)
    {
        $form = $this->createForm(new SourceType(), $entity, array(
            'action' => $this->generateUrl('video_source_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Source entity.
     *
     */
    public function newAction()
    {
        return parent::newAction();

    }

    /**
     * Finds and displays a Source entity.
     *
     */
    public function showAction($id)
    {
        return parent::showAction($id);

    }

    /**
     * Displays a form to edit an existing Source entity.
     *
     */
    public function editAction($id)
    {
        return parent::editAction($id);

    }

    /**
    * Creates a form to edit a Source entity.
    *
    * @param Source $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Source $entity)
    {
        $form = $this->createForm(new SourceType(), $entity, array(
            'action' => $this->generateUrl('video_source_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Source entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        return parent::updateAction($request, $id);

    }
    /**
     * Deletes a Source entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
return parent::deleteAction($request, $id);

    }

    /**
     * Creates a form to delete a Source entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('video_source_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
