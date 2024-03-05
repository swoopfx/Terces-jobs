<?php

namespace Recruiter\Service;

use Doctrine\ORM\EntityManager;

class RecruiterService
{

    private EntityManager $entityManager;

    /**
     * Undocumented function
     *
     * @param array $data
     * @return void|array
     */
    public function postjob(array $data)
    {
        return [];

        // hydrate mysql 
        // hydrate elastic 

    }



    /**
     * Set the value of entityManager
     *
     * @return  self
     */
    public function setEntityManager($entityManager)
    {
        $this->entityManager = $entityManager;

        return $this;
    }
}
