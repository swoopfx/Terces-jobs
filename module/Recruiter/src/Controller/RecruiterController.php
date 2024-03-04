<?php

namespace Recruiter\Controller;

use Doctrine\ORM\EntityManager;
use General\Entity\ActiveJobCountry;
use General\Entity\JobApplyLinkType;
use General\Entity\JobSkills;
use General\Entity\PostjobType;
use General\Entity\PostJobWorkplaceType;
use Laminas\Mvc\Controller\AbstractActionController;
use Laminas\View\Model\JsonModel;
use Laminas\View\Model\ViewModel;

class RecruiterController extends AbstractActionController
{

    /**
     * Undocumented variable
     *
     * @var EntityManager
     */
    private EntityManager $entityManager;


    public function indexAction()
    {
        $view = new ViewModel();
        return $view;
    }
    public function postJobAction()
    {

        $viewModel = new ViewModel();
        return $viewModel;
    }

    public function getRecruiterCompanyAction()
    {
        $jsonModel = new JsonModel();
        $em = $this->entityManager;
        // $data = $em->getRepository()
        return $jsonModel;
    }

    public function getJobTypeAction()
    {
        $jsonModel = new JsonModel();
        $em = $this->entityManager;
        $data = $em->getRepository(PostjobType::class)->createQueryBuilder("j")
            ->select("j")
            ->getQuery()
            ->getArrayResult();
        $jsonModel->setVariables([
            'data' => $data
        ]);
        return $jsonModel;
    }

    public function getWorkplaceTypeAction()
    {
        $jsonModel = new JsonModel();
        $em = $this->entityManager;
        $data = $em->getRepository(PostJobWorkplaceType::class)->createQueryBuilder("j")
            ->select("j")
            ->getQuery()
            ->getArrayResult();
        $jsonModel->setVariables([
            'data' => $data
        ]);
        return $jsonModel;
    }


    public function getActiveCountryAction()
    {
        $jsonModel = new JsonModel();
        $em = $this->entityManager;
        $data = $em->getRepository(ActiveJobCountry::class)->createQueryBuilder("j")
            ->select("j")
            ->getQuery()
            ->getArrayResult();
        $jsonModel->setVariables([
            'data' => $data
        ]);
        return $jsonModel;
    }


    public function getJobApplyLinksAction()
    {
        $jsonModel = new JsonModel();
        $em = $this->entityManager;
        $data = $em->getRepository(JobApplyLinkType::class)->createQueryBuilder("j")
            ->select("j")
            ->getQuery()
            ->getArrayResult();
        $jsonModel->setVariables([
            'data' => $data
        ]);
        return $jsonModel;
    }

    public function getJobSkillsAction()
    {
        $jsonModel = new JsonModel();
        $em = $this->entityManager;
        $data = $em->getRepository(JobSkills::class)->createQueryBuilder("j")
            ->select("j")
            ->getQuery()
            ->getArrayResult();
        $jsonModel->setVariables([
            'data' => $data
        ]);
        return $jsonModel;
    }

    public function searchSkillsAction()
    {

        $em = $this->entityManager;
        $jsonModel = new JsonModel();
        $id = $this->params()->fromRoute("id", NULL);
        if ($id != NULL) {
            $data = $em->getRepository(JobSkills::class)
                ->createQueryBuilder("l")
                ->select([
                    "l"
                ])
                ->where('l.skill LIKE :word')
                ->setParameter('word', '%' . $id . '%')
                ->setMaxResults(12)
                ->getQuery()
                // ->setHydrationMode(Query::HYDRATE_ARRAY)
                ->getArrayResult();
            $jsonModel->setVariable("data", $data);
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
