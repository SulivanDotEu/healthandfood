<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of LangueManager
 *
 * @author Benjamin
 */
namespace Walva\HafBundle\Langue;


class LangueManager {
    //put your code here
    
    private $session;
    public $langueFr = "fr";
    public $langueNl = "nl";
    private $token = 'LangueManager';

    public function __construct($session)
    {
        $this->session = $session;
    }
    
    
    public function getCurrentLangue(){
        $langue = $this->session->get($this->token);
        if(!isset($langue)){
            $langue = $this->langueFr;
            $this->setCurrentLangue($langue);
        }
        return $langue;
    }
    
    public function setCurrentLangue($langue){
        $this->session->set($this->token, $langue);
    }
}

?>
