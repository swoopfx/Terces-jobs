<?php

namespace Recruiter\Service;

use Doctrine\ORM\EntityManager;
use Elastic\Service\RecruiterElasticService;
use General\Entity\ActiveJobCountry;
use General\Entity\JobApplyLinkType;
use General\Entity\Marketing;
use General\Entity\PostjobType;
use General\Entity\PostJobWorkplaceType;
use Ramsey\Uuid\Uuid;
use Recruiter\Entity\RecruiterCompany;
use Recruiter\Entity\RecruiterJob;
use Recruiter\Entity\RecruiterJobPosition;

class RecruiterService
{

    /**
     * Undocumented variable
     *
     * @var EntityManager
     */
    private EntityManager $entityManager;

    private $auth;

    /**
     * Undocumented variable
     *
     * @var RecruiterElasticService
     */
    private RecruiterElasticService $recruiterElastic;

    /**
     * Undocumented function
     *
     * @param array $data
     * @return void|array
     */
    public function postjob(array $data)
    {
        $em = $this->entityManager;
        $uuid = self::generateUuid();
        try {
            $jobEntity = new RecruiterJob();
            /**
             * @var RecruiterCompany
             */
            // $company = $em->find(RecruiterCompany::class, $data["associatedCompany"]);
            $jobType = $em->find(PostjobType::class, $data["jobType"]);
            $workPlaceType = $em->find(PostJobWorkplaceType::class, $data["workplaceType"]);
            // $jobPosition = $em->find(RecruiterJobPosition::class, )
            $jobPositionObject = json_decode($data["jobPosition"], true);
            $jobPositionEntity = $em->find(RecruiterJobPosition::class, $jobPositionObject["id"]);
            $countryObject = json_decode($data["country"], true);
            $countryEntity = $em->find(ActiveJobCountry::class, $countryObject["id"]);
            $skillsObject = json_decode($data["skills"], true);
            $skillsString = "";
            foreach ($skillsObject as $skill) {
                $skillsString .= $skill["name"] . ", ";
            }
            $em = $this->entityManager;

            $jobEntity->setJobTitle($data["jobTitle"])
                // ->setAssociatedCompany($company)
                ->setPoster($this->auth->getIdentity())
                ->setJobDescription($data["jobDescription"])
                ->setCountry($countryEntity)
                ->setWorkplaceType($workPlaceType)
                ->setUuid($uuid)
                ->setSkills($data["skills"])
                ->setJobPosition($jobPositionEntity)
                ->setCreatedOn(new \DateTime("now"))
                ->setMarketing($em->find(Marketing::class, $data["marketing"]))
                ->setOtherMarketing($data["otherMarketing"])
                ->setApplyLinkType($em->find(JobApplyLinkType::class, $data["applyLink"]))
                ->setExternalLink($data["externalLink"])
                ->setIsActive(TRUE)
                ->setJobType($jobType);
            $em->persist($jobEntity);

            // var_dump($skillsString);

            // hydrate mysql 
            $elasticParams = [
                "uuid" => $uuid,
                "job_title" => $data["jobTitle"],
                "poster" => $this->auth->getIdentity()->getId(),
                "company_name" => "", //$company->getCompanyName(),
                "work_place_type" => $workPlaceType->getWorkplaceType(),
                "job_type" => $jobType->getType(),
                "country" => $countryEntity->getCountry(),
                "job_position" => $jobPositionEntity->getPosition(),
                "job_description" => $data["jobDescription"],
                "skills" => $skillsString,
                "tags" => $skillsString . " " . $data["jobTitle"],
                "datetime" => ""
            ];
            // $this->recruiterElastic->createJob($elasticParams);

            $em->flush();
            // hydrate elastic 
            return [
                "uuid" => $uuid
            ];
        } catch (\Throwable $th) {
            throw new \Exception($th->getMessage());
        }
    }

    public static function generateUuid()
    {
        return Uuid::uuid4();
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

    /**
     * Set the value of recruiterElastic
     *
     * @return  self
     */
    public function setRecruiterElastic($recruiterElastic)
    {
        $this->recruiterElastic = $recruiterElastic;

        return $this;
    }

    /**
     * Set the value of auth
     *
     * @return  self
     */
    public function setAuth($auth)
    {
        $this->auth = $auth;

        return $this;
    }
}
