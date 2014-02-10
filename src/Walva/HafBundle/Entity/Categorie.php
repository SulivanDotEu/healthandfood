<?php

namespace Walva\HafBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Categorie
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Walva\HafBundle\Entity\CategorieRepository")
 */
class Categorie
{
    
    
    public function __toString() {
        return $this->getNomFr();
    }
    
    public function content($locale){
        if($locale == "fr"){
            return $this->getNomFr();
        }
        if($locale == "nl"){
            return $this->getNomNl();
        }
    }

    
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nomFr", type="string", length=255)
     */
    private $nomFr;

    /**
     * @var string
     *
     * @ORM\Column(name="nomNl", type="string", length=255)
     */
    private $nomNl;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nomFr
     *
     * @param string $nomFr
     * @return Categorie
     */
    public function setNomFr($nomFr)
    {
        $this->nomFr = $nomFr;
    
        return $this;
    }

    /**
     * Get nomFr
     *
     * @return string 
     */
    public function getNomFr()
    {
        return $this->nomFr;
    }

    /**
     * Set nomNl
     *
     * @param string $nomNl
     * @return Categorie
     */
    public function setNomNl($nomNl)
    {
        $this->nomNl = $nomNl;
    
        return $this;
    }

    /**
     * Get nomNl
     *
     * @return string 
     */
    public function getNomNl()
    {
        return $this->nomNl;
    }
}
