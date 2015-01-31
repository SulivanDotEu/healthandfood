<?php

namespace Walva\HafBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Livre
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Walva\HafBundle\Entity\LivreRepository")
 */
class Livre {
    
    function __construct() {
        $this->dateCreation = new \DateTime('NOW');
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
     * @ORM\Column(name="titre", type="string", length=255)
     */
    private $titre;

    /**
     * @var string
     *
     * @ORM\Column(name="langue", type="string", length=3)
     */
    private $langue;
    
    /**
     * @var string
     *
     * @ORM\Column(name="auteur", type="string", length=255)
     */
    private $auteur;

    /**
     * @var integer
     *
     * @ORM\Column(name="nombrePages", type="smallint")
     */
    private $nombrePages;

    /**
     * @var string
     *
     * @ORM\Column(name="ISBN", type="string", length=255)
     */
    private $ISBN;

    /**
     * @var string
     *
     * @ORM\Column(name="edition", type="string", length=255)
     */
    private $edition;

    /**
     * @var string
     *
     * @ORM\Column(name="prix", type="string", length=255)
     */
    private $prix;

    /**
     * @var string
     *
     * @ORM\Column(name="contenu2", type="text")
     */
    private $contenu;

    /**
     * @ORM\OneToOne(targetEntity="Image", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $image;
    
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateCreate", type="datetime")
     */
    private $dateCreation;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set auteur
     *
     * @param string $auteur
     * @return Livre
     */
    public function setAuteur($auteur) {
        $this->auteur = $auteur;

        return $this;
    }

    /**
     * Get auteur
     *
     * @return string 
     */
    public function getAuteur() {
        return $this->auteur;
    }

    /**
     * Set nombrePages
     *
     * @param integer $nombrePages
     * @return Livre
     */
    public function setNombrePages($nombrePages) {
        $this->nombrePages = $nombrePages;

        return $this;
    }

    /**
     * Get nombrePages
     *
     * @return integer 
     */
    public function getNombrePages() {
        return $this->nombrePages;
    }

    /**
     * Set ISBN
     *
     * @param string $ISBN
     * @return Livre
     */
    public function setISBN($ISBN) {
        $this->ISBN = $ISBN;

        return $this;
    }

    /**
     * Get ISBN
     *
     * @return string 
     */
    public function getISBN() {
        return $this->ISBN;
    }

    /**
     * Set edition
     *
     * @param string $edition
     * @return Livre
     */
    public function setEdition($edition) {
        $this->edition = $edition;

        return $this;
    }

    /**
     * Get edition
     *
     * @return string 
     */
    public function getEdition() {
        return $this->edition;
    }

    /**
     * Set prix
     *
     * @param string $prix
     * @return Livre
     */
    public function setPrix($prix) {
        $this->prix = $prix;

        return $this;
    }

    /**
     * Get prix
     *
     * @return string 
     */
    public function getPrix() {
        return $this->prix;
    }

    /**
     * Set contenu
     *
     * @param string $contenu
     * @return Livre
     */
    public function setContenu($contenu) {
        $this->contenu = $contenu;

        return $this;
    }

    /**
     * Get contenu
     *
     * @return string 
     */
    public function getContenu() {
        return $this->contenu;
    }

    /**
     * Set contenu2
     *
     * @param string $contenu2
     * @return Livre
     */
    public function setContenu2($contenu2) {
        $this->contenu2 = $contenu2;

        return $this;
    }

    /**
     * Get contenu2
     *
     * @return string 
     */
    public function getContenu2() {
        return $this->contenu2;
    }


    /**
     * Set image
     *
     * @param \Walva\HafBundle\Entity\Image $image
     * @return Livre
     */
    public function setImage(\Walva\HafBundle\Entity\Image $image = null)
    {
        $this->image = $image;
    
        return $this;
    }

    /**
     * Get image
     *
     * @return \Walva\HafBundle\Entity\Image 
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set titre
     *
     * @param string $titre
     * @return Livre
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;
    
        return $this;
    }

    /**
     * Get titre
     *
     * @return string 
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set dateCreation
     *
     * @param \DateTime $dateCreation
     * @return Livre
     */
    public function setDateCreation($dateCreation)
    {
        $this->dateCreation = $dateCreation;
    
        return $this;
    }

    /**
     * Get dateCreation
     *
     * @return \DateTime 
     */
    public function getDateCreation()
    {
        return $this->dateCreation;
    }

    /**
     * @return string
     */
    public function getLangue()
    {
        return $this->langue;
    }

    /**
     * @param string $langue
     */
    public function setLangue($langue)
    {
        $this->langue = $langue;
    }

}