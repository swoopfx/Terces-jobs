<?php
namespace General\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="job_skills")
 */
class JobSkills{

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
    private string $skill;

    /**
     * Undocumented variable
     * @ORM\Column(nullable=true)
     * @var string
     */
    private string $associatedJob;



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
    public function getSkill()
    {
        return $this->skill;
    }

    /**
     * Set undocumented variable
     *
     * @param  string  $skill  Undocumented variable
     *
     * @return  self
     */ 
    public function setSkill(string $skill)
    {
        $this->skill = $skill;

        return $this;
    }

    /**
     * Get undocumented variable
     *
     * @return  string
     */ 
    public function getAssociatedJob()
    {
        return $this->associatedJob;
    }

    /**
     * Set undocumented variable
     *
     * @param  string  $associatedJob  Undocumented variable
     *
     * @return  self
     */ 
    public function setAssociatedJob(string $associatedJob)
    {
        $this->associatedJob = $associatedJob;

        return $this;
    }
}