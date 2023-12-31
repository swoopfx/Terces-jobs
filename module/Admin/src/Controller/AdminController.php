<?php

namespace Admin\Controller;

use Laminas\Mvc\Controller\AbstractActionController;
use Laminas\View\Model\ViewModel;

class AdminController extends AbstractActionController
{

    public function indexAction(){
        $viewModel = new ViewModel();
        return $viewModel
    }
}
