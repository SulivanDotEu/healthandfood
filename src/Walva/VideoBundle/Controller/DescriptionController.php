<?php

namespace Walva\VideoBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use \Walva\CrudAdminBundle\Controller\CrudController as Controller;

use Walva\VideoBundle\Entity\Description;
use Walva\VideoBundle\Form\DescriptionType;

/**
 * Description controller.
 *
 */
class DescriptionController extends Controller
{

function __construct() {
    $this->setRoutes(array(
        self::$ROUTE_INDEX_ADD => 'video_description_new',
        self::$ROUTE_INDEX_INDEX => 'video_description',
        self::$ROUTE_INDEX_DELETE => 'video_description_show',
        self::$ROUTE_INDEX_EDIT => 'video_description_edit',
        self::$ROUTE_INDEX_SHOW => 'video_description_show',
    ));

    $this->setLayoutPath('WalvaVideoBundle:Description:layout.html.twig');
    $this->setIndexPath("WalvaVideoBundle:Description:index.html.twig");
    $this->setShowPath("WalvaVideoBundle:Description:show.html.twig");
    $this->setEditPath("WalvaVideoBundle:Description:edit.html.twig");
    $this->setNewPath("WalvaVideoBundle:Description:new.html.twig");

    $this->setColumnsHeader(array(
        "Id",
        "Langue",
        "Name",
        "Video",
        ));
}

public function createEntity() {
        return new Description();
    }

public function getRepository() {
        $em = $this->getDoctrine()->getManager();
        return $em->getRepository('WalvaVideoBundle:Description');
    }

    /**
     * Lists all Description entities.
     *
     */
    public function indexAction()
    {
        return parent::indexAction();

    }
    /**
     * Creates a new Description entity.
     *
     */
    public function createAction(Request $request)
    {
        return parent::createAction($request);

    }

    /**
    * Creates a form to create a Description entity.
    *
    * @param Description $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    public function createCreateForm(Description $entity)
    {
        $form = $this->createForm(new DescriptionType(), $entity, array(
            'action' => $this->generateUrl('video_description_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Description entity.
     *
     */
    public function newAction()
    {
        return parent::newAction();

    }

    /**
     * Finds and displays a Description entity.
     *
     */
    public function showAction($id)
    {
        return parent::showAction($id);

    }

    /**
     * Displays a form to edit an existing Description entity.
     *
     */
    public function editAction($id)
    {
        return parent::editAction($id);

    }

    /**
    * Creates a form to edit a Description entity.
    *
    * @param Description $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    public function createEditForm(Description $entity)
    {
        $form = $this->createForm(new DescriptionType(), $entity, array(
            'action' => $this->generateUrl('video_description_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Description entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        return parent::updateAction($request, $id);

    }
    /**
     * Deletes a Description entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
return parent::deleteAction($request, $id);

    }

    /**
     * Creates a form to delete a Description entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    public function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('video_description_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
