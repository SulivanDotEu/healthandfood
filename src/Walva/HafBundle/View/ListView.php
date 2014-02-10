<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Walva\HafBundle\View;

/**
 * Description of ArticleListView
 *
 * @author Benjamin
 */
class ListView {
    //put your code here
    protected $data;
    protected $currentPage;
    protected $delegate;
    
    
    public function getElements(){
        return $this->getData();
    }
    
    public function getElementByPage(){
        return $this->getDelegate()->getElementByPage();
    }
    
    public function hasPreviousPage(){
        if($currentPage != 1) return true;
        else return false;
    }
    
    public function hasNextPage(){
        if($currentPage != 1) return true;
        else return false;
    }
    
    public function getMaxPage(){
        return 5;
    }
    
    public function getPage(){
        //return 1;
        return $this->getCurrentPage();
    }
    
    public function countPages(){
        
        return ceil(count($this->getData()) / $this->getElementByPage());
    }
    
    public function generateUrlWithPage($page){
        return $this->getDelegate()->generateUrlForPage($page);
    }
    
    public function generateUrl(){
        return $this->getDelegate()->generateUrlForPage($this->getCurrentPage());
    }
    
    
    // GETTERS AND SETTERS
    
    public function getData() {
        return $this->data;
    }

    public function getCurrentPage() {
        return $this->delegate->getPage();
    }

    public function getDelegate() {
        return $this->delegate;
    }

    public function setData($data) {
        $this->data = $data;
    }

    public function setCurrentPage($currentPage) {
        $this->currentPage = $currentPage;
    }

    public function setDelegate($delegate) {
        $this->delegate = $delegate;
    }


    
}
