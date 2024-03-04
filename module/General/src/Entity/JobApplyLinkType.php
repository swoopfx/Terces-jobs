<?php

namespace General\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="job_apply_link_type")
 * recruiters EMail
 * Company email
 * external link
 * Custom Email
 */
class JobApplyLinkType
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
     * @ORM\Column(nullable=false, name="apply_type")
     * @var string
     */
    private string $applyType;

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
    public function getApplyType()
    {
        return $this->applyType;
    }

    /**
     * Set undocumented variable
     *
     * @param  string  $applyType  Undocumented variable
     *
     * @return  self
     */ 
    public function setApplyType(string $applyType)
    {
        $this->applyType = $applyType;

        return $this;
    }
}
