<?php

namespace HAF\CalendarBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use \Walva\CrudAdminBundle\Controller\CrudController as Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use HAF\CalendarBundle\Entity\CategoryDescription;
use HAF\CalendarBundle\Form\CategoryDescriptionType;

/**
 * CategoryDescription controller.
 *
 * @Route("/description")
 */
class CategoryDescriptionController extends Controller
{

function __construct() {
    $this->setRoutes(array(
        self::$ROUTE_INDEX_ADD => 'calendar_category_description_new',
        self::$ROUTE_INDEX_INDEX => 'calendar_category_description',
        self::$ROUTE_INDEX_DELETE => 'calendar_category_description_delete',
        self::$ROUTE_INDEX_EDIT => 'calendar_category_description_edit',
        self::$ROUTE_INDEX_SHOW => 'calendar_category_description_show',
    ));

    $this->setLayoutPath('HAFCalendarBundle:CategoryDescription:layout.html.twig');
    $this->setIndexPath("HAFCalendarBundle:CategoryDescription:index.html.twig");
    $this->setShowPath("HAFCalendarBundle:CategoryDescription:show.html.twig");
    $this->setEditPath("HAFCalendarBundle:CategoryDescription:edit.html.twig");
    $this->setNewPath("HAFCalendarBundle:CategoryDescription:new.html.twig");

    $this->setColumnsHeader(array(
        "Id",
        ));
}

public function createEntity() {
        return new CategoryDescription();
    }

public function getRepository() {
        $em = $this->getDoctrine()->getManager();
        return $em->getRepository('HAFCalendarBundle:CategoryDescription');
    }

    /**
     * Lists all CategoryDescription entities.
     *
     * @Route("/", name="calendar_category_description")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        return parent::indexAction();

    }
    /**
     * Creates a new CategoryDescription entity.
     *
     * @Route("/", name="calendar_category_description_create")
     * @Method("POST")
     * @Template("HAFCalendarBundle:CategoryDescription:new.html.twig")
     */
    public function createAction(Request $request)
    {
        return parent::createAction($request);

    }

    /**
    * Creates a form to create a CategoryDescription entity.
    *
    * @param CategoryDescription $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    public function createCreateForm(CategoryDescription $entity)
    {
        $form = $this->createForm(new CategoryDescriptionType(), $entity, array(
            'action' => $this->generateUrl('calendar_category_description_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new CategoryDescription entity.
     *
     * @Route("/new", name="calendar_category_description_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        return parent::newAction();

    }

    /**
     * Finds and displays a CategoryDescription entity.
     *
     * @Route("/{id}", name="calendar_category_description_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        return parent::showAction($id);

    }

    /**
     * Displays a form to edit an existing CategoryDescription entity.
     *
     * @Route("/{id}/edit", name="calendar_category_description_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        return parent::editAction($id);

    }

    /**
    * Creates a form to edit a CategoryDescription entity.
    *
    * @param CategoryDescription $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    public function createEditForm(CategoryDescription $entity)
    {
        $form = $this->createForm(new CategoryDescriptionType(), $entity, array(
            'action' => $this->generateUrl('calendar_category_description_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing CategoryDescription entity.
     *
     * @Route("/{id}", name="calendar_category_description_update")
     * @Method("PUT")
     * @Template("HAFCalendarBundle:CategoryDescription:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        return parent::updateAction($request, $id);

    }
    /**
     * Deletes a CategoryDescription entity.
     *
     * @Route("/{id}", name="calendar_category_description_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
return parent::deleteAction($request, $id);

    }

    /**
     * Creates a form to delete a CategoryDescription entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    public function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('calendar_category_description_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
