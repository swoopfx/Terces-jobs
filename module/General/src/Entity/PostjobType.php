<?php
namespace General\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Fulltime 
 * Contract
 * Temp
 * Parttime
 * Volunteer
 * Internship
 * Others
 * 
 * @ORM\Entity
 * @ORM\Table(name="post_job_type")
 */
class PostjobType {

     /**
     *
     * @var integer @ORM\Column(name="id", type="integer", nullable=false)
     *      @ORM\Id
     *      @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @ORM\Column(nume="post_job_type")
     *
     * @var string
     */
    private $type;

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
     * Get the value of type
     *
     * @return  string
     */ 
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set the value of type
     *
     * @param  string  $type
     *
     * @return  self
     */ 
    public function setType(string $type)
    {
        $this->type = $type;

        return $this;
    }
}