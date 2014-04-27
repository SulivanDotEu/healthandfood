<?php

namespace Walva\CrudAdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

abstract class CrudController extends Controller {

    public static $ROUTE_INDEX_ADD = 1;
    public static $ROUTE_INDEX_INDEX = 2;
    public static $ROUTE_INDEX_EDIT = 3;
    public static $ROUTE_INDEX_SHOW = 4;
    public static $ROUTE_INDEX_DELETE = 5;
    // path for template
    private $indexPath = 'WalvaCrudAdminBundle:Crud:index.html.twig';
    private $showPath = 'WalvaCrudAdminBundle:Crud:show.html.twig';
    private $newPath = 'WalvaCrudAdminBundle:Crud:new.html.twig';
    private $editPath = 'WalvaCrudAdminBundle:Crud:edit.html.twig';
    // route for generate url
    private $routeAdd;
    private $routeIndex;
    private $routeEdit;
    private $routeShow;
    private $routeDelete;
    private $layoutPath = 'WalvaCrudAdminBundle:Crud:layout.html.twig';
    private $columnsHeader;

    abstract function createEntity();

    /**
     * @return \Doctrine\Common\Persistence\ObjectRepository
     */
    abstract function getRepository();

    public function indexAction() {

        return $this->renderIndexAction();
    }

    protected function renderIndexAction() {
        $params = $this->getRenderParams();
        $params['colums'] = $this->getColumnsHeader();
        $params['entities'] = $this->getRepository()->findAll();
        $params['columns'] = $this->getColumnsHeader();
        
        return $this->render(
                        $this->getIndexPath(), $params);
    }
    
    protected function getRenderParams(){
        return array(
            'layoutPath' => $this->getLayoutPath(),
            //'entities' => $this->getRepository()->findAll(),
            'routeIndex' => $this->getRouteIndex(),
            'routeAdd' => $this->getRouteAdd(),
            'routeEdit' => $this->getRouteEdit(),
            'routeShow' => $this->getRouteShow(),
            'routeDelete' => $this->getRouteDelete(),
            //'columns' => $this->getColumnsHeader(),
        );
    }

   

    public function getIndexPath() {
        return $this->indexPath;
    }

    public function setIndexPath($indexPath) {
        $this->indexPath = $indexPath;
    }

    //-------- SHOW ACTION

    public function showAction($id) {
        $entity = $this->getRepository()->find($id);
        if (!$entity)
            throw $this->createNotFoundException('Unable to find Parking entity.');

        $deleteForm = $this->createDeleteForm($id);

        $params = $this->getRenderParams();
        $params['entity'] = $entity;
        $params['delete_form'] = $deleteForm->createView();

        return $this->renderShowAction($params);
    }

    protected function renderShowAction($params) {
        return $this->render($this->getShowPath(), $params);
    }

    public function getShowPath() {
        return $this->showPath;
    }

    public function setShowPath($showPath) {
        $this->showPath = $showPath;
    }

    // ------- NEW ACTION

    public function newAction() {
        $entity = $this->createEntity();
        $form = $this->createCreateForm($entity);
        $params = $this->getRenderParams();
        $params['form'] = $form->createView();
        $params['entity'] = $entity;

        return $this->renderNewAction($params);
    }

    protected function renderNewAction($params) {
        return $this->render($this->getNewPath(), $params);
    }

    //-------- CREATE ACTION

    public function createAction(Request $request) {
        $entity = $this->createEntity();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);
        /* @var $form \Symfony\Component\Form\Form */

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();
            return $this->redirect($this->generateUrl(
                  $this->getRouteShow(), array('id' => $entity->getId())));
        }

        return $this->redirect($this->generateUrl(
                  $this->getRouteAdd(), array('id' => $entity->getId())));
        
    }

/*
    private function createCreateForm($entity) {
        $form = $this->createForm(new ParkingType(), $entity, array(
            'action' => $this->generateUrl('parking_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }*/


    public function editAction($id) {
        $entity = $this->getRepository()->find($id);
        if (!$entity) 
            throw $this->createNotFoundException('Unable to find entity.');

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);
        
        $params = $this->getRenderParams();
        $params['entity'] = $entity;
        $params['edit_form'] = $editForm->createView();
        $params['delete_form'] = $deleteForm->createView();
        return $this->renderEditAction($params);

    }
    
    protected function renderEditAction($params){
        return $this->render($this->getEditPath(), $params);
    }


    public function updateAction(Request $request, $id) {
        $entity = $this->getRepository()->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirect($this->generateUrl($this->getRouteEdit(), array('id' => $id)));
        }

        $params = $this->getRenderParams();
        $params['entity'] = $entity;
        $params['edit_form'] = $editForm->createView();
        $params['delete_form'] = $deleteForm->createView();
        return $this->renderEditAction($params);
    }


    public function deleteAction(Request $request, $id) {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $entity = $this->getRepository()->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find entity.');
            }

            $this->getDoctrine()->getManager()->remove($entity);
            $this->getDoctrine()->getManager()->flush();
        }

        return $this->redirect($this->generateUrl($this->getRouteIndex()));
    }

    //----------- GETTERS AND SETTERS

    public function getRouteAdd() {
        if (empty($this->routeAdd))
            throw new \Exception(
            "Some variable or method have to be overwrite : "
            . "GetRouteAdd or do setRouteAdd");
        return $this->routeAdd;
    }

    public function getRouteIndex() {
        return $this->routeIndex;
    }

    public function setRouteAdd($routeAdd) {
        $this->routeAdd = $routeAdd;
    }

    public function setRouteIndex($routeIndex) {
        $this->routeIndex = $routeIndex;
    }

    public function getLayoutPath() {
        return $this->layoutPath;
    }

    public function setLayoutPath($layoutPath) {
        $this->layoutPath = $layoutPath;
    }

    public function getColumnsHeader() {
        return $this->columnsHeader;
    }

    public function setColumnsHeader($columnsHeader) {
        $this->columnsHeader = $columnsHeader;
    }

    public function getRouteEdit() {
        return $this->routeEdit;
    }

    public function getRouteShow() {
        return $this->routeShow;
    }

    public function getRouteDelete() {
        return $this->routeDelete;
    }

    public function setRouteEdit($routeEdit) {
        $this->routeEdit = $routeEdit;
    }

    public function setRouteShow($routeShow) {
        $this->routeShow = $routeShow;
    }

    public function setRouteDelete($routeDelete) {
        $this->routeDelete = $routeDelete;
    }

    public function getRoutes() {
        return array(
            self::$ROUTE_INDEX_ADD => $this->getRouteAdd(),
            self::$ROUTE_INDEX_INDEX => $this->getRouteIndex(),
        );
    }

    public function getNewPath() {
        return $this->newPath;
    }

    public function setNewPath($newPath) {
        $this->newPath = $newPath;
    }
    
    public function getEditPath() {
        return $this->editPath;
    }

    public function setEditPath($editPath) {
        $this->editPath = $editPath;
    }
    
    public function setRoutes($routes) {
        $this->setRouteAdd($routes[self::$ROUTE_INDEX_ADD]);
        $this->setRouteDelete($routes[self::$ROUTE_INDEX_DELETE]);
        $this->setRouteEdit($routes[self::$ROUTE_INDEX_EDIT]);
        $this->setRouteIndex($routes[self::$ROUTE_INDEX_INDEX]);
        $this->setRouteShow($routes[self::$ROUTE_INDEX_SHOW]);
    }

}
