<?php

namespace Walva\VideoBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use \Walva\CrudAdminBundle\Controller\CrudController as Controller;

use Walva\VideoBundle\Entity\YoutubeVideo;
use Walva\VideoBundle\Form\YoutubeVideoType;

/**
 * YoutubeVideo controller.
 *
 */
class YoutubeVideoController extends Controller
{

function __construct() {
    $this->setRoutes(array(
        self::$ROUTE_INDEX_ADD => 'video_youtube_new',
        self::$ROUTE_INDEX_INDEX => 'video_youtube',
        self::$ROUTE_INDEX_DELETE => 'video_youtube_show',
        self::$ROUTE_INDEX_EDIT => 'video_youtube_edit',
        self::$ROUTE_INDEX_SHOW => 'video_youtube_show',
    ));

    $this->setLayoutPath('WalvaVideoBundle:YoutubeVideo:layout.html.twig');
    $this->setIndexPath("WalvaVideoBundle:YoutubeVideo:index.html.twig");
    $this->setShowPath("WalvaVideoBundle:YoutubeVideo:show.html.twig");
    $this->setEditPath("WalvaVideoBundle:YoutubeVideo:edit.html.twig");

    $this->setColumnsHeader(array(
        "Id",
        ));
}

public function createEntity() {
        return new YoutubeVideo();
    }

public function getRepository() {
        $em = $this->getDoctrine()->getManager();
        return $em->getRepository('WalvaVideoBundle:YoutubeVideo');
    }

    /**
     * Lists all YoutubeVideo entities.
     *
     */
    public function indexAction()
    {
        return parent::indexAction();

    }
    /**
     * Creates a new YoutubeVideo entity.
     *
     */
    public function createAction(Request $request)
    {
        return parent::createAction($request);

    }

    /**
    * Creates a form to create a YoutubeVideo entity.
    *
    * @param YoutubeVideo $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    public function createCreateForm(YoutubeVideo $entity)
    {
        $form = $this->createForm(new YoutubeVideoType(), $entity, array(
            'action' => $this->generateUrl('video_youtube_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new YoutubeVideo entity.
     *
     */
    public function newAction()
    {
        return parent::newAction();

    }

    /**
     * Finds and displays a YoutubeVideo entity.
     *
     */
    public function showAction($id)
    {
        return parent::showAction($id);

    }

    /**
     * Displays a form to edit an existing YoutubeVideo entity.
     *
     */
    public function editAction($id)
    {
        return parent::editAction($id);

    }

    /**
    * Creates a form to edit a YoutubeVideo entity.
    *
    * @param YoutubeVideo $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    public function createEditForm(YoutubeVideo $entity)
    {
        $form = $this->createForm(new YoutubeVideoType(), $entity, array(
            'action' => $this->generateUrl('video_youtube_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing YoutubeVideo entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        return parent::updateAction($request, $id);

    }
    /**
     * Deletes a YoutubeVideo entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
return parent::deleteAction($request, $id);

    }

    /**
     * Creates a form to delete a YoutubeVideo entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    public function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('video_youtube_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
