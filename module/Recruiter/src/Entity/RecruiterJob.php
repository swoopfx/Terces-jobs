<?php

namespace Recruiter\Entity;

use Authentication\Entity\User;
use Doctrine\ORM\Mapping as ORM;
use General\Entity\ActiveJobCountry;
use General\Entity\JobApplyLinkType;
use General\Entity\Marketing;
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
     * @ORM\Column(nullable=false, unique=true)
     * @var string
     */
    private string $uuid;

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
     * @ORM\ManyToOne(targetEntity="RecruiterJobPosition")
     * @var RecruiterJobPosition
     */
    private RecruiterJobPosition $jobPosition;

    /**
     * Undocumented variable
     * @ORM\ManyToOne(targetEntity="General\Entity\ActiveJobCountry")
     * @var ActiveJobCountry
     */
    private ActiveJobCountry $country;


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
     * @ORM\Column(type="datetime", nullable=true)
     * @var \DateTime
     */
    private \DateTime $createdOn;

    /**
     * Undocumented variable
     * @ORM\Column(type="boolean", nullable=false, options={"default":"0"})
     * @var bool
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
     * serailized dataset
     * @ORM\Column(type="text", nullable=true)
     * @var string
     */
    private string $skills;

    /**
     * Undocumented variable
     * @ORM\Column(type="datetime", nullable=true)
     * @var \DateTime
     */
    private  \DateTime $updatedOn;

    /**
     * Undocumented variable
     * @ORM\ManyToOne(targetEntity="General\Entity\JobApplyLinkType")
     * @var JobApplyLinkType
     */
    private JobApplyLinkType $applyLinkType;

    /**
     * Undocumented variable
     * @ORM\ManyToOne(targetEntity="General\Entity\Marketing")
     * @var Marketing
     */
    private Marketing $marketing;

    /**
     * Dependent on JobApplyLinkType
     * @ORM\Column(name="external_link", nullable=false)
     * @var string
     */
    private string $externalLink;

    /**
     * Undocumented variable
     * @ORM\Column(nullable=true)
     * @var string
     */
    private string $otherMarketing;

   

    /**
     * Undocumented variable
     * @ORM\Column(type="text", nullable=true)
     * @var string
     */
    private string $filterQuestions;

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

    /**
     * Get undocumented variable
     *
     * @return  RecruiterJobPosition
     */
    public function getJobPosition()
    {
        return $this->jobPosition;
    }

    /**
     * Set undocumented variable
     *
     * @param  RecruiterJobPosition  $jobPosition  Undocumented variable
     *
     * @return  self
     */
    public function setJobPosition(RecruiterJobPosition $jobPosition)
    {
        $this->jobPosition = $jobPosition;

        return $this;
    }

    /**
     * Get undocumented variable
     *
     * @return  PostJobWorkplaceType
     */
    public function getWorkplaceType()
    {
        return $this->workplaceType;
    }

    /**
     * Set undocumented variable
     *
     * @param  PostJobWorkplaceType  $workplaceType  Undocumented variable
     *
     * @return  self
     */
    public function setWorkplaceType(PostJobWorkplaceType $workplaceType)
    {
        $this->workplaceType = $workplaceType;

        return $this;
    }

    /**
     * Get undocumented variable
     *
     * @return  \DateTime
     */
    public function getCreatedOn()
    {
        return $this->createdOn;
    }

    /**
     * Set undocumented variable
     *
     * @param  \DateTime  $createdOn  Undocumented variable
     *
     * @return  self
     */
    public function setCreatedOn(\DateTime $createdOn)
    {
        $this->createdOn = $createdOn;
        $this->updatedOn = $createdOn;
        return $this;
    }

    /**
     * Get undocumented variable
     *
     * @return  bool
     */
    public function getIsActive()
    {
        return $this->isActive;
    }

    /**
     * Set undocumented variable
     *
     * @param  bool  $isActive  Undocumented variable
     *
     * @return  self
     */
    public function setIsActive(bool $isActive)
    {
        $this->isActive = $isActive;

        return $this;
    }

    /**
     * Get undocumented variable
     *
     * @return  RecruiterCompany
     */
    public function getAssociatedCompany()
    {
        return $this->associatedCompany;
    }

    /**
     * Set undocumented variable
     *
     * @param  RecruiterCompany  $associatedCompany  Undocumented variable
     *
     * @return  self
     */
    public function setAssociatedCompany(RecruiterCompany $associatedCompany)
    {
        $this->associatedCompany = $associatedCompany;

        return $this;
    }

    /**
     * Get undocumented variable
     *
     * @return  string
     */
    public function getSkills()
    {
        return $this->skills;
    }

    /**
     * Set undocumented variable
     *
     * @param  string  $skills  Undocumented variable
     *
     * @return  self
     */
    public function setSkills(string $skills)
    {
        $this->skills = $skills;

        return $this;
    }

    /**
     * Get undocumented variable
     *
     * @return  \DateTime
     */
    public function getUpdatedOn()
    {
        return $this->updatedOn;
    }

    /**
     * Set undocumented variable
     *
     * @param  \DateTime  $updatedOn  Undocumented variable
     *
     * @return  self
     */
    public function setUpdatedOn(\DateTime $updatedOn)
    {
        $this->updatedOn = $updatedOn;

        return $this;
    }

    /**
     * Get undocumented variable
     *
     * @return  JobApplyLinkType
     */
    public function getApplyLinkType()
    {
        return $this->applyLinkType;
    }

    /**
     * Set undocumented variable
     *
     * @param  JobApplyLinkType  $applyLinkType  Undocumented variable
     *
     * @return  self
     */
    public function setApplyLinkType(JobApplyLinkType $applyLinkType)
    {
        $this->applyLinkType = $applyLinkType;

        return $this;
    }

    /**
     * Get undocumented variable
     *
     * @return  ActiveJobCountry
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set undocumented variable
     *
     * @param  ActiveJobCountry  $country  Undocumented variable
     *
     * @return  self
     */
    public function setCountry(ActiveJobCountry $country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get dependent on JobApplyLinkType
     *
     * @return  string
     */
    public function getExternalLink()
    {
        return $this->externalLink;
    }

    /**
     * Set dependent on JobApplyLinkType
     *
     * @param  string  $externalLink  Dependent on JobApplyLinkType
     *
     * @return  self
     */
    public function setExternalLink(string $externalLink)
    {
        $this->externalLink = $externalLink;

        return $this;
    }

    /**
     * Get undocumented variable
     *
     * @return  string
     */
    public function getFilterQuestions()
    {
        return $this->filterQuestions;
    }

    /**
     * Set undocumented variable
     *
     * @param  string  $filterQuestions  Undocumented variable
     *
     * @return  self
     */
    public function setFilterQuestions(string $filterQuestions)
    {
        $this->filterQuestions = $filterQuestions;

        return $this;
    }

    /**
     * Get undocumented variable
     *
     * @return  Marketing
     */
    public function getMarketing()
    {
        return $this->marketing;
    }

    /**
     * Set undocumented variable
     *
     * @param  Marketing  $marketing  Undocumented variable
     *
     * @return  self
     */
    public function setMarketing(Marketing $marketing)
    {
        $this->marketing = $marketing;

        return $this;
    }

    /**
     * Get undocumented variable
     *
     * @return  string
     */
    public function getOtherMarketing()
    {
        return $this->otherMarketing;
    }

    /**
     * Set undocumented variable
     *
     * @param  string  $otherMarketing  Undocumented variable
     *
     * @return  self
     */
    public function setOtherMarketing(string $otherMarketing)
    {
        $this->otherMarketing = $otherMarketing;

        return $this;
    }

    /**
     * Get undocumented variable
     *
     * @return  string
     */ 
    public function getUuid()
    {
        return $this->uuid;
    }

    /**
     * Set undocumented variable
     *
     * @param  string  $uuid  Undocumented variable
     *
     * @return  self
     */ 
    public function setUuid(string $uuid)
    {
        $this->uuid = $uuid;

        return $this;
    }
}
