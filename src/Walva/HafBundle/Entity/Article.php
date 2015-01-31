<?php

namespace Walva\HafBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Article
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Walva\HafBundle\Entity\ArticleRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Article
{

    const LANGUAGE_FR = 'fr';
    const LANGUAGE_NL = 'nl';


    function __construct()
    {
        $this->dateCreation = new \DateTime('NOW');
    }

    /** @ORM\PreUpdate */
    public function processUpdate()
    {
        $this->dateModification = new \DateTime('NOW');
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
     * @var \DateTime
     * @ORM\Column(name="dateCreate", type="datetime")
     */
    private $dateCreation;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateModification", type="datetime", nullable=true)
     */
    private $dateModification;

    /**
     * @var string
     *
     * @ORM\Column(name="langue", type="string", length=3)
     */
    private $langue;

    /**
     * @var string
     *
     * @ORM\Column(name="titre", type="text")
     */
    private $titre;

    /**
     * @var string
     *
     * @ORM\Column(name="contenu", type="text")
     */
    private $contenu;

    /**
     * @var string
     *
     * @ORM\Column(name="resume", type="text")
     */
    private $resume;

    /**
     * @ORM\ManyToOne(targetEntity="Auteur")
     * @ORM\JoinColumn(nullable=true)
     */
    private $auteur;

    /**
     * @ORM\ManyToOne(targetEntity="Categorie")
     * @ORM\JoinColumn(nullable=true)
     */
    private $categorie;

    /**
     * @ORM\ManyToMany(targetEntity="Tag")
     * @ORM\JoinColumn(nullable=true)
     */
    private $tag;

    /**
     * @ORM\ManyToMany(targetEntity="Reference")
     * @ORM\JoinColumn(nullable=true)
     */
    private $reference;

    /**
     * @ORM\ManyToOne(targetEntity="Image", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $image;

    /**
     * @Gedmo\Slug(fields={"titre"})
     * @ORM\Column(length=128, unique=false)
     */
    private $slug;

    /**
     * @ORM\ManyToMany(targetEntity="Walva\VideoBundle\Entity\AbstractVideo")
     */
    private $videos;

    function __toString()
    {
        return 'Article #'.$this->getId().' : '.substr($this->getTitre(), 0, 50);
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
     * Set langue
     *
     * @param string $langue
     * @return Article
     */
    public function setLangue($langue)
    {
        $this->langue = $langue;

        return $this;
    }

    /**
     * Get langue
     *
     * @return string
     */
    public function getLangue()
    {
        return $this->langue;
    }

    /**
     * Set contenu
     *
     * @param string $contenu
     * @return Article
     */
    public function setContenu($contenu)
    {
        $this->contenu = $contenu;

        return $this;
    }

    /**
     * Get contenu
     *
     * @return string
     */
    public function getContenu()
    {
        return $this->contenu;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Article
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set auteur
     *
     * @param \stdClass $auteur
     * @return Article
     */
    public function setAuteur($auteur)
    {
        $this->auteur = $auteur;

        return $this;
    }

    /**
     * Get auteur
     *
     * @return \stdClass
     */
    public function getAuteur()
    {
        return $this->auteur;
    }

    /**
     * Set titre
     *
     * @param string $titre
     * @return Article
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
     * Set resume
     *
     * @param string $resume
     * @return Article
     */
    public function setResume($resume)
    {
        $this->resume = $resume;

        return $this;
    }

    /**
     * Get resume
     *
     * @return string
     */
    public function getResume()
    {
        return $this->resume;
    }

    /**
     * Set dateCreation
     *
     * @param \DateTime $dateCreation
     * @return Article
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
     * Set dateModification
     *
     * @param \DateTime $dateModification
     * @return Article
     */
    public function setDateModification($dateModification)
    {
        $this->dateModification = $dateModification;

        return $this;
    }

    /**
     * Get dateModification
     *
     * @return \DateTime
     */
    public function getDateModification()
    {
        return $this->dateModification;
    }

    /**
     * Set reference
     *
     * @param \Walva\HafBundle\Entity\Reference $reference
     * @return Article
     */
    public function setReference(\Walva\HafBundle\Entity\Reference $reference = null)
    {
        $this->reference = $reference;

        return $this;
    }

    /**
     * Get reference
     *
     * @return \Walva\HafBundle\Entity\Reference
     */
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * Set tag
     *
     * @param \Walva\HafBundle\Entity\Tag $tag
     * @return Article
     */
    public function setTag(\Walva\HafBundle\Entity\Tag $tag = null)
    {
        $this->tag = $tag;

        return $this;
    }

    /**
     * Get tag
     *
     * @return \Walva\HafBundle\Entity\Tag
     */
    public function getTag()
    {
        return $this->tag;
    }

    /**
     * Add tag
     *
     * @param \Walva\HafBundle\Entity\Tag $tag
     * @return Article
     */
    public function addTag(\Walva\HafBundle\Entity\Tag $tag)
    {
        $this->tag[] = $tag;

        return $this;
    }

    /**
     * Remove tag
     *
     * @param \Walva\HafBundle\Entity\Tag $tag
     */
    public function removeTag(\Walva\HafBundle\Entity\Tag $tag)
    {
        $this->tag->removeElement($tag);
    }

    /**
     * Add reference
     *
     * @param \Walva\HafBundle\Entity\Reference $reference
     * @return Article
     */
    public function addReference(\Walva\HafBundle\Entity\Reference $reference)
    {
        $this->reference[] = $reference;

        return $this;
    }

    /**
     * Remove reference
     *
     * @param \Walva\HafBundle\Entity\Reference $reference
     */
    public function removeReference(\Walva\HafBundle\Entity\Reference $reference)
    {
        $this->reference->removeElement($reference);
    }

    /**
     * Set image
     *
     * @param \Walva\HafBundle\Entity\Image $image
     * @return Article
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
     * Set categorie
     *
     * @param \Walva\HafBundle\Entity\Categorie $categorie
     * @return Article
     */
    public function setCategorie(\Walva\HafBundle\Entity\Categorie $categorie = null)
    {
        $this->categorie = $categorie;

        return $this;
    }

    /**
     * Get categorie
     *
     * @return \Walva\HafBundle\Entity\Categorie
     */
    public function getCategorie()
    {
        return $this->categorie;
    }

    public function getSlug()
    {
        return $this->slug;
    }

    public function setSlug($slug)
    {
        $this->slug = $slug;
        return $this;
    }


    /**
     * Add videos
     *
     * @param \Walva\VideoBundle\Entity\AbstractVideo $videos
     * @return Article
     */
    public function addVideo(\Walva\VideoBundle\Entity\AbstractVideo $videos)
    {
        $this->videos[] = $videos;

        return $this;
    }

    /**
     * Remove videos
     *
     * @param \Walva\VideoBundle\Entity\AbstractVideo $videos
     */
    public function removeVideo(\Walva\VideoBundle\Entity\AbstractVideo $videos)
    {
        $this->videos->removeElement($videos);
    }

    /**
     * Get videos
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getVideos()
    {
        return $this->videos;
    }
}