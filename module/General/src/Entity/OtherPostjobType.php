<?php

namespace General\Entity;

use Authentication\Entity\User;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="other_post_job_type")
 */
class OtherPostjobType
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
     * ManyToOne(targetEntity="Authentication\Entity\User")
     * @var User
     */
    private User $user;

    /**
     * Undocumented variable
     * @ORM\Column(nullable=false)
     * @var string
     */
    private string $type;



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
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set undocumented variable
     *
     * @param  string  $type  Undocumented variable
     *
     * @return  self
     */
    public function setType(string $type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get manyToOne(targetEntity="Authentication\Entity\User")
     *
     * @return  User
     */ 
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set manyToOne(targetEntity="Authentication\Entity\User")
     *
     * @param  User  $user  ManyToOne(targetEntity="Authentication\Entity\User")
     *
     * @return  self
     */ 
    public function setUser(User $user)
    {
        $this->user = $user;

        return $this;
    }
}
