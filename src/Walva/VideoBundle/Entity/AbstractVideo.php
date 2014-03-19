<?php

namespace Walva\VideoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AbstractVideo
 *
 * @ORM\InheritanceType("JOINED")
 * @ORM\Entity(repositoryClass="Walva\VideoBundle\Entity\AbstractVideoRepository")
 * @ORM\DiscriminatorColumn(name="class", type="string")
 */
class AbstractVideo {

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
     * @var \Doctrine\Common\Collections\ArrayCollection()
     * 
     * @ORM\OneToMany(
     *      targetEntity="Walva\VideoBundle\Entity\Description",
     *      cascade={"all"},
     *      mappedBy="video",
     *      fetch="EAGER")
     */
    private $descriptions;

    /**
     * Constructor
     */
    public function __construct() {
        $this->descriptions = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function __toString() {
        return $this->getInternalName();
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set internalName
     *
     * @param string $internalName
     * @return AbstractVideo
     */
    public function setInternalName($internalName) {
        $this->internalName = $internalName;

        return $this;
    }

    /**
     * Get internalName
     *
     * @return string 
     */
    public function getInternalName() {
        return $this->internalName;
    }

    /**
     * Set otherTranslations
     *
     * @param \stdClass $otherTranslations
     * @return AbstractVideo
     */
    public function setOtherTranslations($otherTranslations) {
        $this->otherTranslations = $otherTranslations;

        return $this;
    }

    /**
     * Get otherTranslations
     *
     * @return \stdClass 
     */
    public function getOtherTranslations() {
        return $this->otherTranslations;
    }

    /**
     * Add descriptions
     *
     * @param \Walva\VideoBundle\Entity\Description $descriptions
     * @return AbstractVideo
     */
    public function addDescription(\Walva\VideoBundle\Entity\Description $descriptions) {
        if ($this->getDescriptions()->contains($descriptions))
            return;
        foreach ($this->getDescriptions() as $description) {
            if ($description->equals($descriptions))
                return;
            if ($description->getLanguage() == $descriptions->getLanguage())
                return;
        }

        $this->descriptions[] = $descriptions;

        return $this;
    }

    /**
     * Remove descriptions
     *
     * @param \Walva\VideoBundle\Entity\Description $descriptions
     */
    public function removeDescription(\Walva\VideoBundle\Entity\Description $descriptions) {
        $this->descriptions->removeElement($descriptions);
    }

    /**
     * Get descriptions
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getDescriptions() {
        return $this->descriptions;
    }

}