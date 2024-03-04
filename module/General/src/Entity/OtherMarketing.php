<?php

namespace General\Entity;

use Authentication\Entity\User;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="other_marketing")
 */
class OtherMarketing
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
     * @ORM\ManyToOne(targetEntity="Authentication\Entity\User")
     * @var User
     */
    private User $user;

    /**
     * Undocumented variable
     * @ORM\Column(nullable=false)
     * @var string
     */
    private string $otherMarket;

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
    public function getOtherMarket()
    {
        return $this->otherMarket;
    }

    /**
     * Set undocumented variable
     *
     * @param  string  $otherMarket  Undocumented variable
     *
     * @return  self
     */
    public function setOtherMarket(string $otherMarket)
    {
        $this->otherMarket = $otherMarket;

        return $this;
    }
}
