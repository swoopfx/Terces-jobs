<?php

namespace Recruiter\Entity;

use Authentication\Entity\User;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="postjob_counter")
 */
class PostjobCounter
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
     * @ORM\ManyToOne(targetEntity="Authentication\Entity\User")
     * @var  User
     */
    private int $user;

    /**
     * Undocumented variable
     * @ORM\Column(name="counter", type="integer", options={"default":0})
     * @var int
     */
    private $counter;

    /**
     * Undocumented variable
     * @ORM\Column(type="datetime", name="created_on")
     * @var \Datetime
     */
    private $createdOn;

    /**
     * Undocumented variable
     * @ORM\Column(type="datetime", name="updated_on")
     * @var \Datetime
     */
    private $updatedOn;
}
