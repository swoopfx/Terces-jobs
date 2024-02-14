<?php

namespace Application\Controller;

use Application\Entity\Newsletter;
use Application\Entity\NewsletterCategory;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Query;
use Doctrine\ORM\Tools\Pagination\Paginator;
use General\Service\GeneralService;
use Laminas\Mvc\Controller\AbstractActionController;
use Laminas\View\Model\JsonModel;
use Laminas\View\Model\ViewModel;

class NewsController extends AbstractActionController
{

    /**
     * Undocumented variable
     *
     * @var EntityManager
     */
    private EntityManager $entityManager;

    public function detailsAction()
    {
        $viewModel = new ViewModel();
        $uuid = $this->params()->fromRoute("id", NULL);
        if ($uuid == NULL) {
            $this->flashMessenger()->addErrorMessage("Absent identifier");
            $url = $this->getRequest()->getHeader('Referer')->getUri();
            return $this->redirect()->toUrl($url);
        }
        $em = $this->entityManager;
        $data = $em->getRepository(Newsletter::class)->findOneBy([
            "uuid" => $uuid
        ]);
        $viewModel->setVariable("data", $data);
        return $viewModel;
    }

    public function getNewsletterCategoryAction()
    {
        $jsonModel = new JsonModel();
        $em = $this->entityManager;
        $data = $em->getRepository(NewsletterCategory::class)->createQueryBuilder("n")
            ->select(["n.id", "n.category"])
            ->getQuery()
            ->getArrayResult();
        $jsonModel->setVariable("data", $data);
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
