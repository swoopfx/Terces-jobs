<?php

namespace General\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="active_job_country")
 */
class ActiveJobCountry
{
    /**
     *
     * @var integer @ORM\Column(name="id", type="integer", nullable=false)
     *      @ORM\Id
     *      @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * Undocumented variable
     * @ORM\Column(nullable=false)
     * @var string
     */
    private $country;

    /**
     * Undocumented variable
     * @ORM\Column(nullable=true)
     * @var string
     */
    private $json;

    /**
     * Undocumented variable
     * @ORM\Column(nullable=false)
     * @var string
     */
    private $flag;

    /**
     * Undocumented variable
     * @ORM\Column(type="datetime")
     * @var \DateTime
     */
    private \DateTime $createdon;

    /**
     * Undocumented variable
     * @ORM\Column(type="datetime")
     * @var \DateTime
     */
    private \DateTime $updatedOn;

    /**
     * Get @ORM\Column(name="id", type="integer", nullable=false)
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
     * @return  string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set undocumented variable
     *
     * @param  string  $country  Undocumented variable
     *
     * @return  self
     */
    public function setCountry(string $country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get undocumented variable
     *
     * @return  \DateTime
     */
    public function getCreatedon()
    {
        return $this->createdon;
    }

    /**
     * Set undocumented variable
     *
     * @param  \DateTime  $createdon  Undocumented variable
     *
     * @return  self
     */
    public function setCreatedon(\DateTime $createdon)
    {
        $this->createdon = $createdon;
        $this->updatedOn = $createdon;
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
     * @return  string
     */ 
    public function getJson()
    {
        return $this->json;
    }

    /**
     * Set undocumented variable
     *
     * @param  string  $json  Undocumented variable
     *
     * @return  self
     */ 
    public function setJson(string $json)
    {
        $this->json = $json;

        return $this;
    }
}
