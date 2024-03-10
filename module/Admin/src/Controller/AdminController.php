<?php

namespace Admin\Controller;

use Doctrine\ORM\EntityManager;
use General\Service\PostMarkService;
use Laminas\Http\Response;
use Laminas\InputFilter\InputFilter;
use Laminas\Mvc\Controller\AbstractActionController;
use Laminas\Mvc\MvcEvent;
use Laminas\Session\Container;
use Laminas\View\Model\JsonModel;
use Laminas\View\Model\ViewModel;

class AdminController extends AbstractActionController
{

    private PostMarkService $postmarkService;

    private EntityManager $entityManager;

    private $activeCampaignService;

    private $authService;

    // public function onDispatch(MvcEvent $e)
    // {
    //     $response = parent::onDispatch($e);
    //     $this->layout()->setTemplate("admin-layout");
    //     return $response;
    // }

    // public function onR

    public function indexAction()
    {
        $this->layout()->setTemplate("admin-layout");
        $viewModel = new ViewModel();
        return $viewModel;
    }

   

    public function dashboardAction()
    {
        $this->layout()->setTemplate("admin-layout");
        $viewModel = new ViewModel();
        return $viewModel;
    }

    public function newsletterAction()
    {
        $this->layout()->setTemplate("admin-layout");
        $viewModel = new ViewModel();
        return $viewModel;
    }

    /**
     * Set the value of postmarkService
     *
     * @return  self
     */ 
    public function setPostmarkService($postmarkService)
    {
        $this->postmarkService = $postmarkService;

        return $this;
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

    /**
     * Set the value of authService
     *
     * @return  self
     */ 
    public function setAuthService($authService)
    {
        $this->authService = $authService;

        return $this;
    }

    /**
     * Set the value of activeCampaignService
     *
     * @return  self
     */ 
    public function setActiveCampaignService($activeCampaignService)
    {
        $this->activeCampaignService = $activeCampaignService;

        return $this;
    }
}
