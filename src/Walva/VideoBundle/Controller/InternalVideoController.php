<?php

namespace Walva\VideoBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Walva\VideoBundle\Entity\InternalVideo;
use Walva\VideoBundle\Form\InternalVideoType;
use \Walva\CrudAdminBundle\Controller\CrudController;

/**
 * InternalVideo controller.
 *
 */
class InternalVideoController extends \Walva\CrudAdminBundle\Controller\CrudController
{
    function __construct() {
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
    
    public function createEntity() {
        return new InternalVideo();
    }

    public function getRepository() {
        $em = $this->getDoctrine()->getManager();
        return $em->getRepository('WalvaVideoBundle:InternalVideo');
    }
    
    /**
    * Creates a form to create a InternalVideo entity.
    *
    * @param InternalVideo $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    public function createCreateForm(InternalVideo $entity)
    {
        $form = $this->createForm(new InternalVideoType(), $entity, array(
            'action' => $this->generateUrl('internalvideo_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }
    
    public function createEditForm(InternalVideo $entity)
    {
        $form = $this->createForm(new InternalVideoType(), $entity, array(
            'action' => $this->generateUrl('internalvideo_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }

    public function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('internalvideo_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
    
}
