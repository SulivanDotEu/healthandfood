<?php

namespace HAF\CalendarBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CategoryDescription
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="HAF\CalendarBundle\Repository\CategoryDescriptionRepository")
 */
class CategoryDescription
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
     * @ORM\Column(name="language", type="string", length=10)
     */
    private $language;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var Category
     * @ORM\ManyToOne(targetEntity="HAF\CalendarBundle\Entity\Category", inversedBy="descriptions")
     */
    private $category;


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
     * @return CategoryDescription
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
     * Set title
     *
     * @param string $title
     * @return CategoryDescription
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
     * Set category
     *
     * @param \HAF\CalendarBundle\Entity\Category $category
     * @return CategoryDescription
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
