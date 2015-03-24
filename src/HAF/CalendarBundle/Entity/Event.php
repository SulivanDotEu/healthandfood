<?php

namespace HAF\CalendarBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Event
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="HAF\CalendarBundle\Repository\EventRepository")
 */
class Event
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
     * @var \DateTime
     *
     * @ORM\Column(name="dateStart", type="datetime")
     */
    private $dateStart;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateEnd", type="datetime", nullable=true)
     */
    private $dateEnd;

    /**
     * @var string
     *
     * @ORM\Column(name="internalName", type="string", length=255)
     */
    private $internalName;

    /**
     * @var array
     *
     * @ORM\OneToMany(targetEntity="HAF\CalendarBundle\Entity\EventDescription", mappedBy="event")
     */
    private $descriptions;


    /**
     * @var Category
     * @ORM\ManyToMany(targetEntity="HAF\CalendarBundle\Entity\Category")
     */
    private $category;


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

    /**
     * @param $locale
     * @return EventDescription
     */
    public function getDescriptionByLocale($locale)
    {
        foreach($this->getDescriptions() as $desc){
            /** @var $desc EventDescription */
            if($desc->getLanguage() == $locale)
            {
                return $desc;
            }
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
     * Set dateStart
     *
     * @param \DateTime $dateStart
     * @return Event
     */
    public function setDateStart($dateStart)
    {
        $this->dateStart = $dateStart;

        return $this;
    }

    /**
     * Get dateStart
     *
     * @return \DateTime 
     */
    public function getDateStart()
    {
        return $this->dateStart;
    }

    /**
     * Set dateEnd
     *
     * @param \DateTime $dateEnd
     * @return Event
     */
    public function setDateEnd($dateEnd)
    {
        $this->dateEnd = $dateEnd;

        return $this;
    }

    /**
     * Get dateEnd
     *
     * @return \DateTime 
     */
    public function getDateEnd()
    {
        return $this->dateEnd;
    }

    /**
     * Set internalName
     *
     * @param string $internalName
     * @return Event
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
     * Set descriptions
     *
     * @param array $descriptions
     * @return Event
     */
    public function setDescriptions($descriptions)
    {
        $this->descriptions = $descriptions;

        return $this;
    }

    /**
     * Get descriptions
     *
     * @return array 
     */
    public function getDescriptions()
    {
        return $this->descriptions;
    }

    /**
     * Add descriptions
     *
     * @param \HAF\CalendarBundle\Entity\EventDescription $descriptions
     * @return Event
     */
    public function addDescription(\HAF\CalendarBundle\Entity\EventDescription $descriptions)
    {
        $this->descriptions[] = $descriptions;

        return $this;
    }

    /**
     * Remove descriptions
     *
     * @param \HAF\CalendarBundle\Entity\EventDescription $descriptions
     */
    public function removeDescription(\HAF\CalendarBundle\Entity\EventDescription $descriptions)
    {
        $this->descriptions->removeElement($descriptions);
    }

    /**
     * Set category
     *
     * @param \HAF\CalendarBundle\Entity\Category $category
     * @return Event
     */
    public function setCategory(\HAF\CalendarBundle\Entity\Category $category = null)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return \HAF\CalendarBundle\Entity\Category 
     */
    public function getCategory()
    {
        return $this->category;
    }
}
