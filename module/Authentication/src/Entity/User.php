<?php

namespace Authentication\Entity;

use Doctrine\ORM\Mapping as ORM;
use Authentication\Entity\UserState;
use Authentication\Entity\Roles;
// use Customer\Entity\Customer;
// use Wallet\Entity\Wallet;

/**
 * @ORM\Entity
 * @ORM\Table(name="user")
 */

class User
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
     *
     * @ORM\Column(nullable=true)
     * @var string
     */
    private $fullname;

    /**
     * @ORM\Column(length=30, nullable=true)
     */
    protected $username;


    /**
     * @ORM\Column(length=30, nullable=false, unique=true)
     */
    private $email;

    /**
     * @ORM\Column(name="password", length=100, nullable=false)
     */
    private $password;

    /**
     * @ORM\ManyToOne(targetEntity="Authentication\Entity\Roles")
     *
     * @var Roles
     */
    private $role;

    /**
     * If the account is still active
     * @ORM\ManyToOne(targetEntity="Authentication\Entity\UserState")
     *
     * @var UserState
     */
    private $state;


    /**
     * Security Question
     * @ORM\ManyToOne(targetEntity="Authentication\Entity\SecurityQuestion")
     * @var string
     */
    private $question;

    /**
     * @var string
     * @ORM\Column(name="answer", type="string", nullable=true)
     */
    private $answer;

    /**
     *
     * @var \DateTime @ORM\Column(name="registration_date", type="datetime", nullable=true)
     */
    protected $registrationDate;

    /**
     *
     * @var string @ORM\Column(name="registration_token", type="string", length=200, nullable=true)
     */
    protected $registrationToken;

    /**
     *
     * @var bool
     * @ORM\Column(name="email_confirmed", type="boolean", nullable=false)
     */
    protected $emailConfirmed;



    /**
     * @ORM\Column(name="is_profiled", type="boolean", nullable=true)
     *
     * @var bool
     */
    private $isProfiled;

    /*
    * @ORM\Column(name="updated_on", type="datetime", nullable=true)
    *
    * @var \DateTime
    */
    private $updatedOn;

    /*
    * @ORM\Column(name="created_on", type="datetime", nullable=true)
    *
    * @var \DateTime
    */
    private $createdOn;



    /**
     * User unique Identity
     * @ORM\Column(nullable=false)
     *
     * @var string
     */
    private $uid;

    /**
     * Unique Identifer
     * @ORM\Column(name="uuid", type="string", nullable=false)
     * @var string
     */
    private $uuid;



    /**
     * Undocumented variable
     * @ORM\Column(type="string", nullable=true)
     *
     * @var string
     */
    private $mobileActivateCode;

    // /**
    //  * Undocumented variable
    //  * @ORM\OneToOne(targetEntity="Wallet\Entity\Wallet", mappedBy="user")
    //  * @var Wallet
    //  */
    // private $wallet;

    // /**
    //  * Undocumented variable
    //  * @ORM\OneToOne(targetEntity="Customer\Entity\Customer", mappedBy="user" )
    //  * @var Customer
    //  */
    // private $customer;

    /**
     * Undocumented variable
     * @ORM\Column(nullable=false, type="boolean", options={"default":0})
     * @var bool
     */
    private $isOauth;


    /**
     * Undocumented variable
     * @ORM\ManyToOne(targetEntity="OAuthProvider")
     * @var OAuthProvider
     */
    private $oauthProvider;

    /**
     * Undocumented variable
     * @ORM\Column(type="string", unique=true, nullable=true)
     * @var string
     */
    private $oauthUid;

    /**
     * Undocumented variable
     * @ORM\Column(type="string", nullable=true)
     * @var string
     */
    private $ipAddress;

    /**
     * Undocumented variable
     * @ORM\Column(nullable=false, type="boolean", options={"default":1})
     * @var bool
     */
    private $isActive;

    /**
     * Undocumented variable
     * @ORM\Column(nullable=true)
     * @var string
     */
    private $companyName;



    /**
     * Get the value of username
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set the value of username
     *
     * @return  self
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
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
     * Get the value of email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of password
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get the value of role
     *
     * @return  Roles
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * Set the value of role
     *
     * @param  Roles  $role
     *
     * @return  self
     */
    public function setRole(Roles $role)
    {
        $this->role = $role;

        return $this;
    }

    /**
     * Get if the account is still aactive
     *
     * @return  UserState
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * Set if the account is still aactive
     *
     * @param  boolean  $state  If the account is still aactive
     *
     * @return  self
     */
    public function setState(UserState $state)
    {
        $this->state = $state;

        return $this;
    }

    /**
     * Get the value of answer
     *
     * @return  string
     */
    public function getAnswer()
    {
        return $this->answer;
    }

    /**
     * Set the value of answer
     *
     * @param  string  $answer
     *
     * @return  self
     */
    public function setAnswer(string $answer)
    {
        $this->answer = $answer;

        return $this;
    }

    /**
     * Get @ORM\Column(name="registration_date", type="datetime", nullable=true)
     *
     * @return  \DateTime
     */
    public function getRegistrationDate()
    {
        return $this->registrationDate;
    }

    /**
     * Set @ORM\Column(name="registration_date", type="datetime", nullable=true)
     *
     * @param  \DateTime  $registrationDate  @ORM\Column(name="registration_date", type="datetime", nullable=true)
     *
     * @return  self
     */
    public function setRegistrationDate(\DateTime $registrationDate)
    {
        $this->registrationDate = $registrationDate;

        return $this;
    }

    /**
     * Get @ORM\Column(name="registration_token", type="string", length=32, nullable=true)
     *
     * @return  string
     */
    public function getRegistrationToken()
    {
        return $this->registrationToken;
    }

    /**
     * Set @ORM\Column(name="registration_token", type="string", length=32, nullable=true)
     *
     * @param  string  $registrationToken  @ORM\Column(name="registration_token", type="string", length=32, nullable=true)
     *
     * @return  self
     */
    public function setRegistrationToken(string $registrationToken)
    {
        $this->registrationToken = $registrationToken;

        return $this;
    }

    /**
     * Get the value of emailConfirmed
     *
     * @return  bool
     */
    public function getEmailConfirmed()
    {
        return $this->emailConfirmed;
    }

    /**
     * Set the value of emailConfirmed
     *
     * @param  bool  $emailConfirmed
     *
     * @return  self
     */
    public function setEmailConfirmed(bool $emailConfirmed)
    {
        $this->emailConfirmed = $emailConfirmed;

        return $this;
    }

    /**
     * Get the value of isProfiled
     *
     * @return  bool
     */
    public function getIsProfiled()
    {
        return $this->isProfiled;
    }

    /**
     * Set the value of isProfiled
     *
     * @param  bool  $isProfiled
     *
     * @return  self
     */
    public function setIsProfiled(bool $isProfiled)
    {
        $this->isProfiled = $isProfiled;

        return $this;
    }

    /**
     * Get /*
     *
     * @return  \DateTime
     */
    public function getUpdatedOn()
    {
        return $this->updatedOn;
    }

    /**
     * Set /*
     *
     * @param  \DateTime  $updatedOn  /*
     *
     * @return  self
     */
    public function setUpdatedOn(\DateTime $updatedOn)
    {
        $this->updatedOn = $updatedOn;

        return $this;
    }

    /**
     * Get /*
     *
     * @return  \DateTime
     */
    public function getCreatedOn()
    {
        return $this->createdOn;
    }

    /**
     * Set /*
     *
     * @param  \DateTime  $createdOn  /*
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
     * Get user unique Identity
     *
     * @return  string
     */
    public function getUid()
    {
        return $this->uid;
    }

    /**
     * Set user unique Identity
     *
     * @param  string  $uid  User unique Identity
     *
     * @return  self
     */
    public function setUid(string $uid)
    {
        $this->uid = $uid;

        return $this;
    }



    /**
     * Get undocumented variable
     *
     * @return  string
     */
    public function getFullname()
    {
        return $this->fullname;
    }

    /**
     * Set undocumented variable
     *
     * @param  string  $fullname  Undocumented variable
     *
     * @return  self
     */
    public function setFullname(string $fullname)
    {
        $this->fullname = $fullname;

        return $this;
    }

    /**
     * Get security Question
     *
     * @return  string
     */
    public function getQuestion()
    {
        return $this->question;
    }

    /**
     * Set security Question
     *
     * @param  string  $question  Security Question
     *
     * @return  self
     */
    public function setQuestion(string $question)
    {
        $this->question = $question;

        return $this;
    }

    /**
     * Get unique Identifer
     *
     * @return  string
     */
    public function getUuid()
    {
        return $this->uuid;
    }

    /**
     * Set unique Identifer
     *
     * @param  string  $uuid  Unique Identifer
     *
     * @return  self
     */
    public function setUuid(string $uuid)
    {
        $this->uuid = $uuid;

        return $this;
    }

    /**
     * Get undocumented variable
     *
     * @return  string
     */
    public function getMobileActivateCode()
    {
        return $this->mobileActivateCode;
    }

    /**
     * Set undocumented variable
     *
     * @param  string  $mobileActivateCode  Undocumented variable
     *
     * @return  self
     */
    public function setMobileActivateCode(string $mobileActivateCode)
    {
        $this->mobileActivateCode = $mobileActivateCode;

        return $this;
    }


    /**
     * Get undocumented variable
     *
     * @return  bool
     */
    public function getIsOauth()
    {
        return $this->isOauth;
    }

    /**
     * Set undocumented variable
     *
     * @param  bool  $isOauth  Undocumented variable
     *
     * @return  self
     */
    public function setIsOauth(bool $isOauth)
    {
        $this->isOauth = $isOauth;

        return $this;
    }

    /**
     * Get undocumented variable
     *
     * @return  OAuthProvider
     */
    public function getOauthProvider()
    {
        return $this->oauthProvider;
    }

    /**
     * Set undocumented variable
     *
     * @param  OAuthProvider  $oauthProvider  Undocumented variable
     *
     * @return  self
     */
    public function setOauthProvider(OAuthProvider $oauthProvider)
    {
        $this->oauthProvider = $oauthProvider;

        return $this;
    }

    /**
     * Get undocumented variable
     *
     * @return  string
     */
    public function getOauthUid()
    {
        return $this->oauthUid;
    }

    /**
     * Set undocumented variable
     *
     * @param  string  $oauthUid  Undocumented variable
     *
     * @return  self
     */
    public function setOauthUid(string $oauthUid)
    {
        $this->oauthUid = $oauthUid;

        return $this;
    }

    /**
     * Get undocumented variable
     *
     * @return  string
     */
    public function getIpAddress()
    {
        return $this->ipAddress;
    }

    /**
     * Set undocumented variable
     *
     * @param  string  $ipAddress  Undocumented variable
     *
     * @return  self
     */
    public function setIpAddress(string $ipAddress)
    {
        $this->ipAddress = $ipAddress;

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
}
