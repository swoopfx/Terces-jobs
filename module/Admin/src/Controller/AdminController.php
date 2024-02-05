<?php

namespace Admin\Controller;

use Laminas\Mvc\Controller\AbstractActionController;
use Laminas\View\Model\ViewModel;

class AdminController extends AbstractActionController
{

    public function indexAction()
    {
        $viewModel = new ViewModel();
        return $viewModel;
    }

    public function dashboardAction()
    {
        $viewModel = new ViewModel();
        return $viewModel;
    }

    public function newsletterAction()
    {
        $viewModel = new ViewModel();
        return $viewModel;
    }
}
