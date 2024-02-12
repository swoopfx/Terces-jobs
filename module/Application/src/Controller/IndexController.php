<?php

declare(strict_types=1);

namespace Application\Controller;

use Application\Entity\HelpPageCategory;
use Doctrine\ORM\EntityManager;
use Laminas\Mvc\Controller\AbstractActionController;
use Laminas\View\Model\JsonModel;
use Laminas\View\Model\ViewModel;

class IndexController extends AbstractActionController
{
    /**
     * Undocumented variable
     *
     * @var EntityManager
     */
    private EntityManager $entityManager;

    public function indexAction()
    {
        // $this->layout()->setTemplate("login-layout");
        return new ViewModel();
    }

    public function getHelpCategoryAction()
    {
        $jsonModel = new JsonModel();
        $em = $this->entityManager;
        $data = $em->getRepository(HelpPageCategory::class)->createQueryBuilder("h")->select("h")->getQuery()->getArrayResult();
        $jsonModel->setVariable("data", $data);
        return $jsonModel;
    }

    public function getHelpPageAction(){
        $jsonModel = new JsonModel();
        return $jsonModel;
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
