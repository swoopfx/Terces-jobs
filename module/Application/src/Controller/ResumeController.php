<?php 
namespace Application\Controller;

use Laminas\Mvc\Controller\AbstractActionController;
use Laminas\View\Model\ViewModel;

class ResumeController extends AbstractActionController{

    private $entityManager;

    public function createResumeAction(){
        $viewModel = new ViewModel();
        return $viewModel;
    }

    public function uploadResumeAction(){
        $viewModel = new ViewModel();
        return $viewModel;
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
