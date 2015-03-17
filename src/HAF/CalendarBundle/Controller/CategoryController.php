<?php

namespace HAF\CalendarBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use \Walva\CrudAdminBundle\Controller\CrudController as Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use HAF\CalendarBundle\Entity\Category;
use HAF\CalendarBundle\Form\CategoryType;

/**
 * Category controller.
 *
 * @Route("/category")
 */
class CategoryController extends Controller
{

    function __construct()
    {
        $this->setRoutes(array(
            self::$ROUTE_INDEX_ADD => 'calendar_category_new',
            self::$ROUTE_INDEX_INDEX => 'calendar_category',
            self::$ROUTE_INDEX_DELETE => 'calendar_category_show',
            self::$ROUTE_INDEX_EDIT => 'calendar_category_edit',
            self::$ROUTE_INDEX_SHOW => 'calendar_category_show',
        ));

        $this->setLayoutPath('HAFCalendarBundle:Category:layout.html.twig');
        $this->setIndexPath("HAFCalendarBundle:Category:index.html.twig");
        $this->setShowPath("HAFCalendarBundle:Category:show.html.twig");
        $this->setEditPath("HAFCalendarBundle:Category:edit.html.twig");
        $this->setNewPath("HAFCalendarBundle:Category:new.html.twig");

        $this->setColumnsHeader(array(
            "Id",
        ));
    }

    public function createEntity()
    {
        return new Category();
    }

    public function getRepository()
    {
        $em = $this->getDoctrine()->getManager();
        return $em->getRepository('HAFCalendarBundle:Category');
    }

    /**
     * Lists all Category entities.
     *
     * @Route("/", name="calendar_category")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        return parent::indexAction();

    }

    /**
     * Creates a new Category entity.
     *
     * @Route("/", name="calendar_category_create")
     * @Method("POST")
     * @Template("HAFCalendarBundle:Category:new.html.twig")
     */
    public function createAction(Request $request)
    {
        return parent::createAction($request);

    }

    /**
     * Creates a form to create a Category entity.
     *
     * @param Category $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    public function createCreateForm(Category $entity)
    {
        $form = $this->createForm(new CategoryType(), $entity, array(
            'action' => $this->generateUrl('calendar_category_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Category entity.
     *
     * @Route("/new", name="calendar_category_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        return parent::newAction();

    }

    /**
     * Finds and displays a Category entity.
     *
     * @Route("/{id}", name="calendar_category_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        return parent::showAction($id);

    }

    /**
     * Displays a form to edit an existing Category entity.
     *
     * @Route("/{id}/edit", name="calendar_category_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        return parent::editAction($id);

    }

    /**
     * Creates a form to edit a Category entity.
     *
     * @param Category $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    public function createEditForm(Category $entity)
    {
        $form = $this->createForm(new CategoryType(), $entity, array(
            'action' => $this->generateUrl('calendar_category_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }

    /**
     * Edits an existing Category entity.
     *
     * @Route("/{id}", name="calendar_category_update")
     * @Method("PUT")
     * @Template("HAFCalendarBundle:Category:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        return parent::updateAction($request, $id);

    }

    /**
     * Deletes a Category entity.
     *
     * @Route("/{id}", name="calendar_category_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        return parent::deleteAction($request, $id);

    }

    /**
     * Creates a form to delete a Category entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    public function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('category_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm();
    }
}
