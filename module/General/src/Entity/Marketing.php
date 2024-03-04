<?php

namespace General\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="marketing")
 */
class Marketing
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
    private string $market;

    

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
    public function getMarket()
    {
        return $this->market;
    }

    /**
     * Set undocumented variable
     *
     * @param  string  $market  Undocumented variable
     *
     * @return  self
     */ 
    public function setMarket(string $market)
    {
        $this->market = $market;

        return $this;
    }
}
