<?php

namespace Walva\VideoBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Walva\VideoBundle\Entity\Description;
use Walva\VideoBundle\Form\DescriptionType;

/**
 * Description controller.
 *
 */
class DescriptionController extends Controller
{

    /**
     * Lists all Description entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('WalvaVideoBundle:Description')->findAll();

        return $this->render('WalvaVideoBundle:Description:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Description entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Description();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('description_show', array('id' => $entity->getId())));
        }

        return $this->render('WalvaVideoBundle:Description:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a Description entity.
    *
    * @param Description $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Description $entity)
    {
        $form = $this->createForm(new DescriptionType(), $entity, array(
            'action' => $this->generateUrl('description_create'),
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
        $entity = new Description();
        $form   = $this->createCreateForm($entity);

        return $this->render('WalvaVideoBundle:Description:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Description entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('WalvaVideoBundle:Description')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Description entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('WalvaVideoBundle:Description:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Description entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('WalvaVideoBundle:Description')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Description entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('WalvaVideoBundle:Description:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Description entity.
    *
    * @param Description $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Description $entity)
    {
        $form = $this->createForm(new DescriptionType(), $entity, array(
            'action' => $this->generateUrl('description_update', array('id' => $entity->getId())),
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
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('WalvaVideoBundle:Description')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Description entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('description_edit', array('id' => $id)));
        }

        return $this->render('WalvaVideoBundle:Description:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Description entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('WalvaVideoBundle:Description')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Description entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('description'));
    }

    /**
     * Creates a form to delete a Description entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('description_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
