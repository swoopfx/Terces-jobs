<?php

namespace Recruiter\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;


/**
 * @ORM\Entity
 * @ORM\Table(name="recruiter_profile")
 */

class RecruiterProfile
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
     *
     * @ORM\OneToMany(targetEntity="RecruiterCompany", mappedBy="recruiterProfile")
     * @var Collection<int, RecruiterCompany>
     */
    private $recruiterCompany;

    private $createdOn;

    private $updatedOn;



    public function __construct()
    {
        $this->recruiterCompany = new ArrayCollection();
    }
}
