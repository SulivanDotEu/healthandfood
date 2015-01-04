<?php

namespace Walva\HafBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tag
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Walva\HafBundle\Entity\TagRepository")
 */
class Tag
{

    const LANGUAGE_FR = 'fr';
    const LANGUAGE_NL = 'nl';

    public function __toString() {
        return $this->getContenuFr();
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
     * @ORM\Column(name="contenuFr", type="string", length=255)
     */
    private $contenuFr;

    /**
     * @var string
     *
     * @ORM\Column(name="contenuNl", type="string", length=255)
     */
    private $contenuNl;

    public function content($locale){
        if($locale == "fr"){
            return $this->getContenuFr();
        }
        if($locale == "nl"){
            return $this->getContenuNl();
        }
    }

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
     * Set contenuFr
     *
     * @param string $contenuFr
     * @return Tag
     */
    public function setContenuFr($contenuFr)
    {
        $this->contenuFr = $contenuFr;
    
        return $this;
    }

    /**
     * Get contenuFr
     *
     * @return string 
     */
    public function getContenuFr()
    {
        return $this->contenuFr;
    }

    /**
     * Set contenuNl
     *
     * @param string $contenuNl
     * @return Tag
     */
    public function setContenuNl($contenuNl)
    {
        $this->contenuNl = $contenuNl;
    
        return $this;
    }

    /**
     * Get contenuNl
     *
     * @return string 
     */
    public function getContenuNl()
    {
        return $this->contenuNl;
    }
}
