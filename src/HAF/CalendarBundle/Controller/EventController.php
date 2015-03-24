<?php

namespace HAF\CalendarBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use \Walva\CrudAdminBundle\Controller\CrudController as Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use HAF\CalendarBundle\Entity\Event;
use HAF\CalendarBundle\Form\EventType;

/**
 * Event controller.
 *
 * @Route("/calendar/event")
 */
class EventController extends Controller
{

function __construct() {
    $this->setRoutes(array(
        self::$ROUTE_INDEX_ADD => 'calendar_event_new',
        self::$ROUTE_INDEX_INDEX => 'calendar_event',
        self::$ROUTE_INDEX_DELETE => 'calendar_event_delete',
        self::$ROUTE_INDEX_EDIT => 'calendar_event_edit',
        self::$ROUTE_INDEX_SHOW => 'calendar_event_show',
    ));

    $this->setLayoutPath('HAFCalendarBundle:Event:layout.html.twig');
    $this->setIndexPath("HAFCalendarBundle:Event:index.html.twig");
    $this->setShowPath("HAFCalendarBundle:Event:show.html.twig");
    $this->setEditPath("HAFCalendarBundle:Event:edit.html.twig");
    $this->setNewPath("HAFCalendarBundle:Event:new.html.twig");

    $this->setColumnsHeader(array(
        "Id",
        ));
}

public function createEntity() {
        return new Event();
    }

public function getRepository() {
        $em = $this->getDoctrine()->getManager();
        return $em->getRepository('HAFCalendarBundle:Event');
    }

    /**
     * Lists all Event entities.
     *
     * @Route("/", name="calendar_event")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        return parent::indexAction();

    }
    /**
     * Creates a new Event entity.
     *
     * @Route("/", name="calendar_event_create")
     * @Method("POST")
     * @Template("HAFCalendarBundle:Event:new.html.twig")
     */
    public function createAction(Request $request)
    {
        return parent::createAction($request);

    }

    /**
    * Creates a form to create a Event entity.
    *
    * @param Event $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    public function createCreateForm(Event $entity)
    {
        $form = $this->createForm(new EventType(), $entity, array(
            'action' => $this->generateUrl('calendar_event_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Event entity.
     *
     * @Route("/new", name="calendar_event_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        return parent::newAction();

    }

    /**
     * Finds and displays a Event entity.
     *
     * @Route("/{id}", name="calendar_event_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        return parent::showAction($id);

    }

    /**
     * Displays a form to edit an existing Event entity.
     *
     * @Route("/{id}/edit", name="calendar_event_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        return parent::editAction($id);

    }

    /**
    * Creates a form to edit a Event entity.
    *
    * @param Event $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    public function createEditForm(Event $entity)
    {
        $form = $this->createForm(new EventType(), $entity, array(
            'action' => $this->generateUrl('calendar_event_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Event entity.
     *
     * @Route("/{id}", name="calendar_event_update")
     * @Method("PUT")
     * @Template("HAFCalendarBundle:Event:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        return parent::updateAction($request, $id);

    }
    /**
     * Deletes a Event entity.
     *
     * @Route("/{id}", name="calendar_event_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
return parent::deleteAction($request, $id);

    }

    /**
     * Creates a form to delete a Event entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    public function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('calendar_event_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
