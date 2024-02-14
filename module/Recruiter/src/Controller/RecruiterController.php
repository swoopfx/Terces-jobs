<?php

namespace Recruiter\Controller;

use Doctrine\ORM\EntityManager;
use Laminas\Mvc\Controller\AbstractActionController;
use Laminas\View\Model\ViewModel;

class RecruiterController extends AbstractActionController
{

    /**
     * Undocumented variable
     *
     * @var EntityManager
     */
    private EntityManager $entityManager;


    public function indexAction()
    {
        $view = new ViewModel();
        return $view;
    }
    public function postJobAction()
    {
       
        $viewModel = new ViewModel();
        return $viewModel;
    }



    /**
     * Set undocumented variable
     *
     * @param  EntityManager  $entityManager  Undocumented variable
     *
     * @return  self
     */
    public function setEntityManager(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;

        return $this;
    }
}
