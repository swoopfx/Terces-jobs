<?php

namespace Application\Controller;

use Doctrine\ORM\EntityManager;
use Laminas\Mvc\Controller\AbstractActionController;
use Laminas\View\Model\ViewModel;
use Recruiter\Entity\RecruiterJob;

class SeekerController extends AbstractActionController
{

    /**
     * Undocumented variable
     *
     * @var EntityManager
     */
    private EntityManager $entityManager;



    /**
     * Undocumented function
     * Provides interface for serching of a job 
     * @return void
     */
    public function seekerAction()
    {
        return new ViewModel();
    }

    /**
     * gets Details of a specific job
     * @return void
     */
    public function jobAction()
    {
        $viewModel = new ViewModel();
        $em = $this->entityManager;
        $data = $em->getRepository(RecruiterJob::class)->createQueryBuilder("j")->select([
            "partial j.{ id, jobTitle, uuid, poster, jobDescription, jobPosition, country, jobType, workplaceType, createdOn, isActive, associatedCompany, skills, applyLinkType, externalLink, minimumPay, maximumPay}", 
            "partial p.{id, fullname, email}",
            "partial ac.{}"
        ]);
        return $viewModel;
    }

    // public function 

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
