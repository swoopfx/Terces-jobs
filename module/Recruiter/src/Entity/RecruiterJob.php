<?php

namespace Recruiter\Entity;

use Authentication\Entity\User;
use Doctrine\ORM\Mapping as ORM;
use General\Entity\PostjobType;
use General\Entity\PostJobWorkplaceType;
use Recruiter\Entity\RecruiterCompany;

/**
 * @ORM\Entity
 * @ORM\Table(name="recruiter_job")
 */
class RecruiterJob
{
    /**
     *
     * @var integer @ORM\Column(name="id", type="integer")
     *      @ORM\Id
     *      @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * 
     * @ORM\Column(type="string", name="job_title")
     * @var string
     */
    private $jobTitle;

    /**
     * Undocumented variable
     * @ORM\ManytoOne(targetEntity="Authentication\Entity\User")
     * @var User
     */
    private $poster;

    /**
     * Undocumented variable
     * @ORM\Column(type="text", nullable=true)
     * @var string
     */
    private $jobDescription;


    /**
     * Undocumented variable
     * @ORM\ManyToOne
     * @var RecruiterJobPosition
     */
    private RecruiterJobPosition $jobPosition;


    /**
     * Undocumented variable
     * @ORM\Column(type="text", nullable=true)
     * @var string
     */
    private string $tags;

    /**
     * Undocumented variable
     * @ORM\ManyToOne(targetEntity="General\Entity\PostjobType")
     * @var PostjobType
     */
    private PostjobType $jobType;

    /**
     * Undocumented variable
     * @ORM\ManyToOne(targetEntity="General\Entity\PostJobWorkplaceType")
     * @var PostJobWorkplaceType
     */
    private PostJobWorkplaceType $workplaceType;

    /**
     * Undocumented variable
     *
     * @var \DateTime
     */
    private \DateTime $createdOn;

    /**
     * Undocumented variable
     * @ORM\Column(type="boolean", nullable=false, options={"default":"0"})
     * @var boolean
     */
    private bool $isActive;

    /**
     * Undocumented variable
     * @ORM\ManyToOne(targetEntity="RecruiterCompany")
     * @var RecruiterCompany
     */
    private RecruiterCompany $associatedCompany;

    /**
     * Undocumented variable
     * @ORM\Column(type="text", nullable=true)
     * @var string
     */
    private string $skills;

    /**
     * Undocumented variable
     * @ORM\Column(type="datetime")
     * @var \DateTime
     */
    private  \DateTime $updatedOn;

    public function __construct()
    {
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
     * Get the value of jobTitle
     *
     * @return  string
     */
    public function getJobTitle()
    {
        return $this->jobTitle;
    }

    /**
     * Set the value of jobTitle
     *
     * @param  string  $jobTitle
     *
     * @return  self
     */
    public function setJobTitle(string $jobTitle)
    {
        $this->jobTitle = $jobTitle;

        return $this;
    }

    /**
     * Get undocumented variable
     *
     * @return  User
     */
    public function getPoster()
    {
        return $this->poster;
    }

    /**
     * Set undocumented variable
     *
     * @param  User  $poster  Undocumented variable
     *
     * @return  self
     */
    public function setPoster(User $poster)
    {
        $this->poster = $poster;

        return $this;
    }

    /**
     * Get undocumented variable
     *
     * @return  string
     */
    public function getJobDescription()
    {
        return $this->jobDescription;
    }

    /**
     * Set undocumented variable
     *
     * @param  string  $jobDescription  Undocumented variable
     *
     * @return  self
     */
    public function setJobDescription(string $jobDescription)
    {
        $this->jobDescription = $jobDescription;

        return $this;
    }

    /**
     * Get undocumented variable
     *
     * @return  string
     */
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * Set undocumented variable
     *
     * @param  string  $tags  Undocumented variable
     *
     * @return  self
     */
    public function setTags(string $tags)
    {
        $this->tags = $tags;

        return $this;
    }

    /**
     * Get undocumented variable
     *
     * @return  PostjobType
     */
    public function getJobType()
    {
        return $this->jobType;
    }

    /**
     * Set undocumented variable
     *
     * @param  PostjobType  $jobType  Undocumented variable
     *
     * @return  self
     */
    public function setJobType(PostjobType $jobType)
    {
        $this->jobType = $jobType;

        return $this;
    }
}
