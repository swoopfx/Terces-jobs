<?php

namespace  Authentication\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="o_auth_provider")
 */
class OAuthProvider
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
    private $provider;

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
    public function getProvider()
    {
        return $this->provider;
    }

    /**
     * Set undocumented variable
     *
     * @param  string  $provider  Undocumented variable
     *
     * @return  self
     */
    public function setProvider(string $provider)
    {
        $this->provider = $provider;

        return $this;
    }
}
