<?php

namespace Recruiter\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity
 * @ORM\Table(name="recruiter_job_position")
 */
class RecruiterJobPosition
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
     * @ORM\Column(nullable=false)
     * @var string
     */
    private $position;

    /**
     * Undocumented variable
     * @ORM\Column(nullable=false, unique=true)
     * @var string
     */
    private string $uuid;

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
     * @return  string
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * Set undocumented variable
     *
     * @param  string  $position  Undocumented variable
     *
     * @return  self
     */
    public function setPosition(string $position)
    {
        $this->position = $position;

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
