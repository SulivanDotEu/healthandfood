<?php

namespace Walva\HafBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Spotlight
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Walva\HafBundle\Entity\SpotlightRepository")
 */
class Spotlight
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
     * @ORM\Column(name="until", type="datetime")
     */
    private $until;

    /**
     * @var \stdClass
     *
     * @ORM\OneToOne(targetEntity="Walva\HafBundle\Entity\Article")
     */
    private $article;

    function __construct()
    {
        $this->until = new \DateTime();
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
     * Set until
     *
     * @param \DateTime $until
     * @return Spotlight
     */
    public function setUntil($until)
    {
        $this->until = $until;

        return $this;
    }

    /**
     * Get until
     *
     * @return \DateTime 
     */
    public function getUntil()
    {
        return $this->until;
    }

    /**
     * Set article
     *
     * @param \stdClass $article
     * @return Spotlight
     */
    public function setArticle($article)
    {
        $this->article = $article;

        return $this;
    }

    /**
     * Get article
     *
     * @return \stdClass 
     */
    public function getArticle()
    {
        return $this->article;
    }
}
