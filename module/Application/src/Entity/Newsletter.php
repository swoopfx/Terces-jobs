<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;
use Authentication\Entity\User;

/**
 * @ORM\Entity
 * @ORM\Table(name="newsletter")
 */
class Newsletter {

     /**
     *
     * @var integer @ORM\Column(name="id", type="integer")
     *      @ORM\Id
     *      @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * Undocumented variable
     * @ORM\ManyToOne(targetEntity="Authentication\Entity\User")
     * @var User
     */
    private $uploader;

    /**
     * Undocumented variable
     * @ORM\ManyToOne(targetEntity="NewsletterCategory")
     * @var NewsletterCategory
     */
    private int $category;

    /**
     * Undocumented variable
     * @ORM\Column(name="titles", type="text", nullable=false)
     * @var string
     */
    private $title;

    /**
     * Undocumented variable
     * @ORM\Column(name="contents", type="text", nullable=false)
     * @var string
     */
    private $content;

    /**
     * Undocumented variable
     * @ORM\Column(name="is_published", type="boolean", nullable=false, options={"default":0})
     * @var bool
     */
    private $isPublished;

    /**
     * Undocumented variable
     * @ORM\Column(name="created_on", type="datetime", nullable=false)
     * @var \Datetime
     */
    private $createdOn;

    /**
     * Undocumented variable
     *
     * @var \Datetime
     */
    private $updatedOn;


    public function __construct()
    {
        $this->isPublished = false;
        $this->createdOn = new \DateTime();
    }

    /**
     * Get @ORM\Column(name="id", type="integer")
     *
     * @return  integer
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get undocumented variable
     *
     * @return  User
     */ 
    public function getUploader()
    {
        return $this->uploader;
    }

    /**
     * Set undocumented variable
     *
     * @param  User  $uploader  Undocumented variable
     *
     * @return  self
     */ 
    public function setUploader(User $uploader)
    {
        $this->uploader = $uploader;

        return $this;
    }

    /**
     * Get undocumented variable
     *
     * @return  NewsletterCategory
     */ 
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set undocumented variable
     *
     * @param  NewsletterCategory  $category  Undocumented variable
     *
     * @return  self
     */ 
    public function setCategory(NewsletterCategory $category)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get undocumented variable
     *
     * @return  string
     */ 
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set undocumented variable
     *
     * @param  string  $title  Undocumented variable
     *
     * @return  self
     */ 
    public function setTitle(string $title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get undocumented variable
     *
     * @return  string
     */ 
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set undocumented variable
     *
     * @param  string  $content  Undocumented variable
     *
     * @return  self
     */ 
    public function setContent(string $content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get undocumented variable
     *
     * @return  bool
     */ 
    public function getIsPublished()
    {
        return $this->isPublished;
    }

    /**
     * Set undocumented variable
     *
     * @param  bool  $isPublished  Undocumented variable
     *
     * @return  self
     */ 
    public function setIsPublished(bool $isPublished)
    {
        $this->isPublished = $isPublished;

        return $this;
    }

    /**
     * Get undocumented variable
     *
     * @return  \Datetime
     */ 
    public function getCreatedOn()
    {
        return $this->createdOn;
    }

    /**
     * Set undocumented variable
     *
     * @param  \Datetime  $createdOn  Undocumented variable
     *
     * @return  self
     */ 
    public function setCreatedOn(\Datetime $createdOn)
    {
        $this->createdOn = $createdOn;
        $this->updatedOn = $createdOn;
        return $this;
    }

    /**
     * Get undocumented variable
     *
     * @return  \Datetime
     */ 
    public function getUpdatedOn()
    {
        return $this->updatedOn;
    }

    /**
     * Set undocumented variable
     *
     * @param  \Datetime  $updatedOn  Undocumented variable
     *
     * @return  self
     */ 
    public function setUpdatedOn(\Datetime $updatedOn)
    {
        $this->updatedOn = $updatedOn;

        return $this;
    }
}