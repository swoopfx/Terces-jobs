<?php

namespace Recruiter\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="recruiter_company")
 */
class RecruiterCompany
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
     * @ORM\ManyToOne(targetEntity="RecruiterProfile", inversedBy="recruiterCompany")
     * @var RecruiterProfile
     */
    private  $recruiterProfile;

    /**
     * Undocumented variable
     * @ORM\Column(name="company_name")
     * @var string
     */
    private $companyName;

    /**
     * @ORM\Column(name="company_address", type="text", nullable=true)
     * @var string
     */
    private $companyAddress;

    /**
     * Undocumented variable
     * @ORM\Column(name="company_description", type="text", nullable=true)
     * @var string
     */
    private $companyDescription;

    /**
     * Undocumented variable
     * @ORM\Column(name="company_email", nullable=true)
     * @var string
     */
    private $companyEmail;

    /**
     * Undocumented variable
     *
     * @var \Datetime
     */
    private $createdOn;

    /**
     * Undocumented variable
     *
     * @var \Datetime
     */
    private $updatedOn;

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
     * @return  RecruiterProfile
     */ 
    public function getRecruiterProfile()
    {
        return $this->recruiterProfile;
    }

    /**
     * Set undocumented variable
     *
     * @param  RecruiterProfile  $recruiterProfile  Undocumented variable
     *
     * @return  self
     */ 
    public function setRecruiterProfile(RecruiterProfile $recruiterProfile)
    {
        $this->recruiterProfile = $recruiterProfile;

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
}
