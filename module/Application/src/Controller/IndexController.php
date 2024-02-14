<?php

declare(strict_types=1);

namespace Application\Controller;

use Application\Entity\HelpPageCategory;
use Doctrine\ORM\EntityManager;
use Laminas\Mvc\Controller\AbstractActionController;
use Laminas\View\Model\JsonModel;
use Laminas\View\Model\ViewModel;
use Application\Entity\HelpPage;

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

    public function getHelpPageAction()
    {
        $jsonModel = new JsonModel();
        $id = $this->params()->fromRoute("id", NULL);
        $em = $this->entityManager;
        $response = $this->getResponse();
        try {
            if ($id == NULL) {
                throw new \Exception("Absent identifier");
            }
            $data = $em->getRepository(HelpPage::class)->createQueryBuilder("h")->select(["h", "c"])->leftJoin("h.category", "c")->where("c.uuid = :uuid")->setParameters([
                "uuid" => $id
            ])->getQuery()->getArrayResult();
            $jsonModel->setVariables([
                "data" => $data
            ]);
        } catch (\Throwable $th) {
            //throw $th;
            $jsonModel->setVariables([
                "success" => false,
                "error" => $th->getMessage()
            ]);
            $response->setStatusCode(400);
        }
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
