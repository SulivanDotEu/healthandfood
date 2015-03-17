<?php

namespace HAF\CalendarBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EventDescription
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="HAF\CalendarBundle\Repository\EventDescriptionRepository")
 */
class EventDescription
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
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="language", type="string", length=10)
     */
    private $language;

    /**
     * @var Event
     * @ORM\ManyToOne(targetEntity="HAF\CalendarBundle\Entity\Event", inversedBy="descriptions")
     */
    private $event;


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
     * Set title
     *
     * @param string $title
     * @return EventDescription
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return EventDescription
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
     * Set language
     *
     * @param string $language
     * @return EventDescription
     */
    public function setLanguage($language)
    {
        $this->language = $language;

        return $this;
    }

    /**
     * Get language
     *
     * @return string 
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * Set event
     *
     * @param \HAF\CalendarBundle\Entity\Event $event
     * @return EventDescription
     */
    public function setEvent(\HAF\CalendarBundle\Entity\Event $event = null)
    {
        $this->event = $event;

        return $this;
    }

    /**
     * Get event
     *
     * @return \HAF\CalendarBundle\Entity\Event 
     */
    public function getEvent()
    {
        return $this->event;
    }
}
