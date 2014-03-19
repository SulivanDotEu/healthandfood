<?php

namespace Walva\VideoBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Walva\VideoBundle\Entity\InternalVideo;
use Walva\VideoBundle\Form\InternalVideoType;

/**
 * InternalVideo controller.
 *
 */
class InternalVideoController extends Controller
{

    /**
     * Lists all InternalVideo entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('WalvaVideoBundle:InternalVideo')->findAll();

        return $this->render('WalvaVideoBundle:InternalVideo:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new InternalVideo entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new InternalVideo();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('internalvideo_show', array('id' => $entity->getId())));
        }

        return $this->render('WalvaVideoBundle:InternalVideo:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a InternalVideo entity.
    *
    * @param InternalVideo $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(InternalVideo $entity)
    {
        $form = $this->createForm(new InternalVideoType(), $entity, array(
            'action' => $this->generateUrl('internalvideo_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new InternalVideo entity.
     *
     */
    public function newAction()
    {
        $entity = new InternalVideo();
        $form   = $this->createCreateForm($entity);

        return $this->render('WalvaVideoBundle:InternalVideo:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a InternalVideo entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('WalvaVideoBundle:InternalVideo')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find InternalVideo entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('WalvaVideoBundle:InternalVideo:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing InternalVideo entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('WalvaVideoBundle:InternalVideo')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find InternalVideo entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('WalvaVideoBundle:InternalVideo:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a InternalVideo entity.
    *
    * @param InternalVideo $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(InternalVideo $entity)
    {
        $form = $this->createForm(new InternalVideoType(), $entity, array(
            'action' => $this->generateUrl('internalvideo_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing InternalVideo entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('WalvaVideoBundle:InternalVideo')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find InternalVideo entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('internalvideo_edit', array('id' => $id)));
        }

        return $this->render('WalvaVideoBundle:InternalVideo:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a InternalVideo entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('WalvaVideoBundle:InternalVideo')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find InternalVideo entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('internalvideo'));
    }

    /**
     * Creates a form to delete a InternalVideo entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('internalvideo_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
