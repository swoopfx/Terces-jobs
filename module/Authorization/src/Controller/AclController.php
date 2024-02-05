<?php

namespace  Authorization\Controller;

use Laminas\Mvc\Controller\AbstractActionController;
use Laminas\View\Model\ViewModel;

class AclController extends AbstractActionController
{
    public function indexAction()
    {
        $this->layout()->setTemplate("error-layout");
        $viewModel = new ViewModel();
        return $viewModel;
    }
}
