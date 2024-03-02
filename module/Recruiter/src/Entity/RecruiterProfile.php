<?php

namespace Recruiter\Entity;

use Authentication\Entity\User;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;


/**
 * @ORM\Entity
 * @ORM\Table(name="recruiter_profile")
 */

class RecruiterProfile
{

    /**
     *
     * @var integer @ORM\Column(name="id", type="integer")
     *      @ORM\Id
     *      @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * Undocumented variable
     * @ORM\ManyToOne(targetEntity="Authentication\Entity\User", inversedBy="recruiterProfile")
     * @var User
     */
    private User $user;

    /**
     * Undocumented variable
     * @ORM\Column(nullable=false)
     * @var string
     */
    private string $companyName;

    /**
     * Undocumented variable
     * @ORM\Column(type="text")
     * @var string
     */
    private string $companyDescription;

    /**
     * @ORM\Column(name="company_address", type="text", nullable=true)
     * @var string
     */
    private $companyAddress;

    /**
     * Undocumented variable
     * @ORM\Column(name="company_email", nullable=true)
     * @var string
     */
    private $companyEmail;

    // private

    /**
     * Undocumented variable
     * @ORM\Column(type="datetime", nullable=false)
     * @var \DateTime
     */
    private \DateTime $createdOn;

    /**
     * Undocumented variable
     * @ORM\Column(type="datetime", nullable=false)
     * @var \DateTime
     */
    private \DateTime $updatedOn;



    public function __construct()
    {
        // $this->recruiterCompany = new ArrayCollection();
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
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set undocumented variable
     *
     * @param  User  $user  Undocumented variable
     *
     * @return  self
     */
    public function setUser(User $user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get undocumented variable
     *
     * @return  string
     */
    public function getCompanyName()
    {
        return $this->companyName;
    }

    /**
     * Set undocumented variable
     *
     * @param  string  $companyName  Undocumented variable
     *
     * @return  self
     */
    public function setCompanyName(string $companyName)
    {
        $this->companyName = $companyName;

        return $this;
    }

    /**
     * Get undocumented variable
     *
     * @return  string
     */
    public function getCompanyDescription()
    {
        return $this->companyDescription;
    }

    /**
     * Set undocumented variable
     *
     * @param  string  $companyDescription  Undocumented variable
     *
     * @return  self
     */
    public function setCompanyDescription(string $companyDescription)
    {
        $this->companyDescription = $companyDescription;

        return $this;
    }

    /**
     * Get the value of companyAddress
     *
     * @return  string
     */
    public function getCompanyAddress()
    {
        return $this->companyAddress;
    }

    /**
     * Set the value of companyAddress
     *
     * @param  string  $companyAddress
     *
     * @return  self
     */
    public function setCompanyAddress(string $companyAddress)
    {
        $this->companyAddress = $companyAddress;

        return $this;
    }

    /**
     * Get undocumented variable
     *
     * @return  string
     */
    public function getCompanyEmail()
    {
        return $this->companyEmail;
    }

    /**
     * Set undocumented variable
     *
     * @param  string  $companyEmail  Undocumented variable
     *
     * @return  self
     */
    public function setCompanyEmail(string $companyEmail)
    {
        $this->companyEmail = $companyEmail;

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
}
