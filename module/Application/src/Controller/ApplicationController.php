<?php

namespace Application\Controller;

use Application\Entity\Newsletter;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Query;
use Doctrine\ORM\Tools\Pagination\Paginator;
use General\Service\GeneralService;
use Laminas\Mvc\Controller\AbstractActionController;
use Laminas\View\Model\ViewModel;

class ApplicationController extends AbstractActionController
{

    /**
     * Undocumented variable
     *
     * @var EntityManager
     */
    private EntityManager $entityManager;

    public function indexAction()
    {
        $viewModel = new ViewModel();
        return $viewModel;
    }

    public function lazyApplicantAction()
    {
        $viewModel = new ViewModel();
        return $viewModel;
    }

    public function careerServiceAction()
    {
        $viewModel = new ViewModel();
        return $viewModel;
    }

    public function careerAdviceAction(){
        $viewModel = new ViewModel();
        return $viewModel;
    }

    public function opportunitiesAction()
    {
        $viewModel = new ViewModel();
        return $viewModel;
    }

    public function aboutAction()
    {
        $viewModel = new ViewModel();
        return $viewModel;
    }
    public function browsejobsAction()
    {
        $viewModel = new ViewModel();
        return $viewModel;
    }

    public function termsAction()
    {
        $viewModel = new ViewModel();
        return $viewModel;
    }

    public function privacyAction()
    {
        $viewModel = new ViewModel();
        return $viewModel;
    }

    public function contactUsAction()
    {
        $viewModel = new ViewModel();
        return $viewModel;
    }

    public function companiesAction()
    {
        $viewModel = new ViewModel();
        return $viewModel;
    }

    public function sitemapAction()
    {
        $viewModel = new ViewModel();
        return $viewModel;
    }

    public function countriesAction()
    {
        $viewModel = new ViewModel();
        return $viewModel;
    }

    public function templatesAction()
    {
        $viewModel = new ViewModel();
        return $viewModel;
    }

    public function helpdeskAction()
    {
        $viewModel = new ViewModel();
        return $viewModel;
    }
    public function advertiseJobAction()
    {
        $viewModel = new ViewModel();
        return $viewModel;
    }
    public function recruitersBlogAction()
    {
        $viewModel = new ViewModel();
        $userId = $this->params()->fromRoute("id", NULL);

        try {
            if ($userId == NULL) {
                throw new \Exception("Invalid user identity");
            }
            $order = ($this->params()->fromQuery("order", NULL) == null ? "DESC" : "ASC");
            $pageCount = ($this->params()->fromQuery("page_count", GeneralService::MAX_PAGE_COUNT) > 100 ? 100 : $this->params()->fromQuery("page_count", GeneralService::MAX_PAGE_COUNT));
            $orderBy = $this->params()->fromQuery("order_by", "id");
            $query = $this->entityManager->createQueryBuilder()->select([
                "n", "i", "u",  "c"
            ])->from(Newsletter::class, "n")
                ->leftJoin("n.referenceImage", "i")
                ->leftJoin("n.uploader", "u")
                ->leftJoin("n.category", "c")
                // ->leftJoin("w.wasteType", "wt")
                // ->leftJoin("w.requestType", "rt")
                // ->leftJoin("w.wasteRequestState", "wrs")
                // ->leftJoin("w.dropOffhost", "dh")
                ->where("n.isPublished = :active")
                // ->andWhere("u.uuid = :uuid")
                ->setParameters([
                    "active" => TRUE,

                ])
                ->orderBy("n.{$orderBy}", $order)
                ->getQuery()
                ->setHydrationMode(Query::HYDRATE_ARRAY);

            $paginator = new Paginator($query);
            $totalItems = count($paginator);

            $currentPage = ($this->params()->fromQuery("page")) ?: 1;
            $totalPageCount = ceil($totalItems / $pageCount);
            $nextPage = (($currentPage < $totalPageCount) ? $currentPage + 1 : $totalPageCount);
            $previousPage = (($currentPage > 1) ? $currentPage - 1 : 1);

            $records = $paginator->getQuery()->setFirstResult($pageCount * ($currentPage - 1))
                ->setMaxResults($pageCount)
                ->getResult(Query::HYDRATE_ARRAY);

            $viewModel->setVariables([
                "previous_page" => $previousPage,
                "next_page" => $nextPage,
                "total_page" => $totalPageCount,
                "data" => $records
            ]);
        } catch (\Throwable $th) {

            // var_dump($th->getTrace());
            $this->flashMessenger()->addErrorMessage("Something went wrong");
            $url = $this->getRequest()->getHeader('Referer')->getUri();
            return $this->redirect()->toUrl($url);
        }
        return $viewModel;
    }

    public function cvBuilderAction()
    {
        $viewModel = new ViewModel();
        return $viewModel;
    }

    public function newsletterAction()
    {
        $viewModel = new ViewModel();
        $userId = $this->params()->fromRoute("id", NULL);

        try {
            if ($userId == NULL) {
                throw new \Exception("Invalid user identity");
            }
            $order = ($this->params()->fromQuery("order", NULL) == null ? "DESC" : "ASC");
            $pageCount = ($this->params()->fromQuery("page_count", GeneralService::MAX_PAGE_COUNT) > 100 ? 100 : $this->params()->fromQuery("page_count", GeneralService::MAX_PAGE_COUNT));
            $orderBy = $this->params()->fromQuery("order_by", "id");
            $query = $this->entityManager->createQueryBuilder()->select([
                "n", "i", "u",  "c"
            ])->from(Newsletter::class, "n")
                ->leftJoin("n.referenceImage", "i")
                ->leftJoin("n.uploader", "u")
                ->leftJoin("n.category", "c")
                // ->leftJoin("w.wasteType", "wt")
                // ->leftJoin("w.requestType", "rt")
                // ->leftJoin("w.wasteRequestState", "wrs")
                // ->leftJoin("w.dropOffhost", "dh")
                ->where("n.isPublished = :active")
                // ->andWhere("u.uuid = :uuid")
                ->setParameters([
                    "active" => TRUE,

                ])
                ->orderBy("n.{$orderBy}", $order)
                ->getQuery()
                ->setHydrationMode(Query::HYDRATE_ARRAY);

            $paginator = new Paginator($query);
            $totalItems = count($paginator);

            $currentPage = ($this->params()->fromQuery("page")) ?: 1;
            $totalPageCount = ceil($totalItems / $pageCount);
            $nextPage = (($currentPage < $totalPageCount) ? $currentPage + 1 : $totalPageCount);
            $previousPage = (($currentPage > 1) ? $currentPage - 1 : 1);

            $records = $paginator->getQuery()->setFirstResult($pageCount * ($currentPage - 1))
                ->setMaxResults($pageCount)
                ->getResult(Query::HYDRATE_ARRAY);

            $viewModel->setVariables([
                "previous_page" => $previousPage,
                "next_page" => $nextPage,
                "total_page" => $totalPageCount,
                "data" => $records
            ]);
        } catch (\Throwable $th) {

            // var_dump($th->getTrace());
            $this->flashMessenger()->addErrorMessage("Something went wrong");
            $url = $this->getRequest()->getHeader('Referer')->getUri();
            return $this->redirect()->toUrl($url);
        }
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
