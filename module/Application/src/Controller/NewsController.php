<?php
namespace Application\Controller;

use Laminas\Mvc\Controller\AbstractActionController;
use Laminas\View\Model\ViewModel;

class NewsController extends AbstractActionController{

    public function newsAction(){
        $viewModel = new ViewModel();
        return $viewModel;
    }

}