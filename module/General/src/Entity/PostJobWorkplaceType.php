<?php

namespace General\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Remote
 * Onsite
 * Hybrid
 * 
 * @ORM\Entity
 * @ORM\Table(name="post_job_workplace_type")
 */
class PostJobWorkplaceType {

     /**
     *
     * @var integer @ORM\Column(name="id", type="integer", nullable=false)
     *      @ORM\Id
     *      @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * Undocumented variable
     * @ORM\Column(name="workplace_type")
     * @var string
     */
    private $workplaceType;

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
    public function getWorkplaceType()
    {
        return $this->workplaceType;
    }

    /**
     * Set undocumented variable
     *
     * @param  string  $workplaceType  Undocumented variable
     *
     * @return  self
     */ 
    public function setWorkplaceType(string $workplaceType)
    {
        $this->workplaceType = $workplaceType;

        return $this;
    }
}