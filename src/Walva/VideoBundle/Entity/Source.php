<?php

namespace Walva\VideoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Source
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Walva\VideoBundle\Entity\SourceRepository")
 */
class Source
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
     * @ORM\Column(name="type", type="string", length=255)
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="path", type="text", nullable=true)
     */
    private $path;

        /**
     * @var string
     *
     * @ORM\Column(name="audioLanguage", type="string", length=255, nullable=true)
     */
    private $audioLanguage;

    /**
     * @var string
     *
     * @ORM\Column(name="subtitlesLanguage", type="string", length=255, nullable=true)
     */
    private $subtitlesLanguage;
    
    /**
     * @var AbstractVideo
     * @ORM\ManyToOne(
     *      targetEntity="Walva\VideoBundle\Entity\InternalVideo",
     *      inversedBy="sources")
     */
    private $video;


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
     * Set type
     *
     * @param string $type
     * @return Source
     */
    public function setType($type)
    {
        $this->type = $type;
    
        return $this;
    }

    /**
     * Get type
     *
     * @return string 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set path
     *
     * @param string $path
     * @return Source
     */
    public function setPath($path)
    {
        $this->path = $path;
    
        return $this;
    }

    /**
     * Get path
     *
     * @return string 
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * Set language
     *
     * @param string $language
     * @return Source
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
     * Set audioLanguage
     *
     * @param string $audioLanguage
     * @return Source
     */
    public function setAudioLanguage($audioLanguage)
    {
        $this->audioLanguage = $audioLanguage;
    
        return $this;
    }

    /**
     * Get audioLanguage
     *
     * @return string 
     */
    public function getAudioLanguage()
    {
        return $this->audioLanguage;
    }

    /**
     * Set subtitlesLanguage
     *
     * @param string $subtitlesLanguage
     * @return Source
     */
    public function setSubtitlesLanguage($subtitlesLanguage)
    {
        $this->subtitlesLanguage = $subtitlesLanguage;
    
        return $this;
    }

    /**
     * Get subtitlesLanguage
     *
     * @return string 
     */
    public function getSubtitlesLanguage()
    {
        return $this->subtitlesLanguage;
    }

    /**
     * Set video
     *
     * @param \Walva\VideoBundle\Entity\InternalVideo $video
     * @return Source
     */
    public function setVideo(\Walva\VideoBundle\Entity\InternalVideo $video = null)
    {
        $this->video = $video;
    
        return $this;
    }

    /**
     * Get video
     *
     * @return \Walva\VideoBundle\Entity\InternalVideo 
     */
    public function getVideo()
    {
        return $this->video;
    }
}