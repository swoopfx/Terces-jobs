<?php

namespace Recruiter;

use Authentication\Entity\User;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="recruiter_job")
 */
class RecruiterJob
{
    /**
     *
     * @var integer @ORM\Column(name="id", type="integer")
     *      @ORM\Id
     *      @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * 
     * @ORM\Column(type="string", name="job_title")
     * @var string
     */
    private $jobTitle;

    /**
     * Undocumented variable
     * @ORM\ManytoOne(targetEntity="Authentication\Entity\User")
     * @var User
     */
    private $poster;

    /**
     * Undocumented variable
     * @ORM\Column(type="text", nullable=true)
     * @var string
     */
    private $jobDescription;
}
