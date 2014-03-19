<?php

namespace Walva\VideoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Description
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Walva\VideoBundle\Entity\DescriptionRepository")
 */
class Description
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
     * @ORM\Column(name="language", type="string", length=255)
     */
    private $language;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;
    
    /**
     * 
     * @ORM\ManyToOne(
     *      targetEntity="Walva\VideoBundle\Entity\AbstractVideo",
     *      inversedBy="descriptions",
     *      cascade={"all"}
     * )
     * 
     * @var AbstractVideo
     */
    private $video;
    
    
    
    public function equals(Description $description){
        if($this->getId() != $description->getId()) return dalse; 
        if($this->getLanguage() != $description->getLanguage()) return false; 
        if($this->getName() != $description->getName()) return false; 
        return true;
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
     * Set language
     *
     * @param string $language
     * @return Description
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
     * Set name
     *
     * @param string $name
     * @return Description
     */
    public function setName($name)
    {
        $this->name = $name;
    
        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Description
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
     * Set video
     *
     * @param \Walva\VideoBundle\Entity\AbstractVideo $video
     * @return Description
     */
    public function setVideo(\Walva\VideoBundle\Entity\AbstractVideo $video = null)
    {
        $this->video = $video;
    
        return $this;
    }

    /**
     * Get video
     *
     * @return \Walva\VideoBundle\Entity\AbstractVideo 
     */
    public function getVideo()
    {
        return $this->video;
    }
    
}