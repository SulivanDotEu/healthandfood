<?php

namespace HAF\CalendarBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use \Walva\CrudAdminBundle\Controller\CrudController as Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use HAF\CalendarBundle\Entity\EventDescription;
use HAF\CalendarBundle\Form\EventDescriptionType;

/**
 * EventDescription controller.
 *
 * @Route("/calendar/event/description")
 */
class EventDescriptionController extends Controller
{

    function __construct()
    {
        $this->setRoutes(array(
            self::$ROUTE_INDEX_ADD    => 'calendar_event_description_new',
            self::$ROUTE_INDEX_INDEX  => 'calendar_event_description',
            self::$ROUTE_INDEX_DELETE => 'calendar_event_description_show',
            self::$ROUTE_INDEX_EDIT   => 'calendar_event_description_edit',
            self::$ROUTE_INDEX_SHOW   => 'calendar_event_description_show',
        ));

        $this->setLayoutPath('HAFCalendarBundle:EventDescription:layout.html.twig');
        $this->setIndexPath("HAFCalendarBundle:EventDescription:index.html.twig");
        $this->setShowPath("HAFCalendarBundle:EventDescription:show.html.twig");
        $this->setEditPath("HAFCalendarBundle:EventDescription:edit.html.twig");
        $this->setNewPath("HAFCalendarBundle:EventDescription:new.html.twig");

        $this->setColumnsHeader(array(
            "Id",
        ));
    }

    public function createEntity()
    {
        return new EventDescription();
    }

    public function getRepository()
    {
        $em = $this->getDoctrine()->getManager();
        return $em->getRepository('HAFCalendarBundle:EventDescription');
    }

    /**
     * Lists all EventDescription entities.
     *
     * @Route("/", name="calendar_event_description")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        return parent::indexAction();

    }

    /**
     * Creates a new EventDescription entity.
     *
     * @Route("/", name="calendar_event_description_create")
     * @Method("POST")
     * @Template("HAFCalendarBundle:EventDescription:new.html.twig")
     */
    public function createAction(Request $request)
    {
        return parent::createAction($request);

    }

    /**
     * Creates a form to create a EventDescription entity.
     *
     * @param EventDescription $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    public function createCreateForm(EventDescription $entity)
    {
        $form = $this->createForm(new EventDescriptionType(), $entity, array(
            'action' => $this->generateUrl('calendar_event_description_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new EventDescription entity.
     *
     * @Route("/new", name="calendar_event_description_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        return parent::newAction();

    }

    /**
     * Finds and displays a EventDescription entity.
     *
     * @Route("/{id}", name="calendar_event_description_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        return parent::showAction($id);

    }

    /**
     * Displays a form to edit an existing EventDescription entity.
     *
     * @Route("/{id}/edit", name="calendar_event_description_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        return parent::editAction($id);

    }

    /**
     * Creates a form to edit a EventDescription entity.
     *
     * @param EventDescription $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    public function createEditForm(EventDescription $entity)
    {
        $form = $this->createForm(new EventDescriptionType(), $entity, array(
            'action' => $this->generateUrl('calendar_event_description_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }

    /**
     * Edits an existing EventDescription entity.
     *
     * @Route("/{id}", name="calendar_event_description_update")
     * @Method("PUT")
     * @Template("HAFCalendarBundle:EventDescription:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        return parent::updateAction($request, $id);

    }

    /**
     * Deletes a EventDescription entity.
     *
     * @Route("/{id}", name="calendar_event_description_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        return parent::deleteAction($request, $id);

    }

    /**
     * Creates a form to delete a EventDescription entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    public function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('calendar_event_description_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm();
    }
}
