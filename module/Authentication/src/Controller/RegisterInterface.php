<?php

namespace Application\Controller;

use Doctrine\ORM\EntityManager;

interface RegisterInterface
{

    public function registerAction();

    public function setEntityManager(EntityManager $entityManager);

    // public function 
}
