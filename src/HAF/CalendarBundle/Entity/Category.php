<?php

namespace HAF\CalendarBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Category
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="HAF\CalendarBundle\Repository\CategoryRepository")
 */
class Category
{
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
     * @ORM\Column(name="internalName", type="string", length=255)
     */
    private $internalName;

    /**
     * @var ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="HAF\CalendarBundle\Entity\CategoryDescription", mappedBy="category", cascade={"all"})
     */
    private $descriptions;

    /**
     * @var string
     *
     * @ORM\Column(name="color", type="string", length=255)
     */
    private $color;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->descriptions = new \Doctrine\Common\Collections\ArrayCollection();
    }

    function __toString()
    {
        return $this->getInternalName();
    }

    public function getTitleForLocale($locale)
    {
        $desc = $this->getDescriptionByLocale($locale);
        if(!$desc)
        {
            return $this->getInternalName();
        }
        return $desc->getTitle();
    }

    public function getDescriptionByLocale($locale)
    {
        foreach($this->getDescriptions() as $desc){
            /** @var $desc CategoryDescription */
            if($desc->getLanguage() == $locale)
            {
                return $desc;
            }
            return $this->getInternalName();
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
     * Set internalName
     *
     * @param string $internalName
     * @return Category
     */
    public function setInternalName($internalName)
    {
        $this->internalName = $internalName;

        return $this;
    }

    /**
     * Get internalName
     *
     * @return string 
     */
    public function getInternalName()
    {
        return $this->internalName;
    }

    /**
     * Set color
     *
     * @param string $color
     * @return Category
     */
    public function setColor($color)
    {
        $this->color = $color;

        return $this;
    }

    /**
     * Get color
     *
     * @return string 
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * Add descriptions
     *
     * @param \HAF\CalendarBundle\Entity\CategoryDescription $descriptions
     * @return Category
     */
    public function addDescription(\HAF\CalendarBundle\Entity\CategoryDescription $descriptions)
    {
        $this->descriptions[] = $descriptions;

        return $this;
    }

    /**
     * Remove descriptions
     *
     * @param \HAF\CalendarBundle\Entity\CategoryDescription $descriptions
     */
    public function removeDescription(\HAF\CalendarBundle\Entity\CategoryDescription $descriptions)
    {
        $this->descriptions->removeElement($descriptions);
    }

    /**
     * Get descriptions
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getDescriptions()
    {
        return $this->descriptions;
    }
}
