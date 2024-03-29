<?php

namespace General\Service;

use Doctrine\ORM\EntityManager;
use Elasticsearch\Client;
use Laminas\Authentication\AuthenticationService;
use General\Entity\Settings;

class GeneralService
{

    const APP_NAME = "Terces Jobs";

    const APP_KEYWORDS = "Jobs";

    const APP_DESCRIPTION = "online job serach";

    const GENERAL_TRAINING_FREE = "Business Analysis Free Hands on training";

    const GENERAL_TRAINING_WORK_EXPERIENCE = "Business Analysis- Self Study";

    const GENERAL_TRAINING_CERTIFICATE_PROGRAM = "Business Analysis Certification Program";

    const GENERAL_TRAINING_INTERVIEW_PREP = "One on One Interview Prep";

    const GENERAL_INTERNSHIP_ON_JOB_TRAINING = "Business Analysis - on the job training";

    const GENERAL_INTERNSHIP_PRICE = 1500;


    const ACTIVE_USER_PROGRAM_STATUS_ACQUIRED = 100;

    const ACTIVE_USER_PROGRAM_STATUS_STARTED_COURSE = 200;

    const ACTIVE_USER_PROGRAM_STATUS_COMPLETED_COURSE = 300;

    const ACTIVE_USER_PROGRAM_STATUS_CACELED_COURSE = 400;


    const COMPANY_NAME = "Terces Jobs";

    const COMPANY_ADDRESS = "";

    const MAX_PAGE_COUNT = 50;

    const INTERNSHIP_INSTALLMENT = "+4 week";


    const ADMISSIONS_SEND_MONEY_INITIATED = 100;

    const ADMISSION_SEND_MONEY_COMPLETED = 200;


    const OAUTH_PROVIDER_GOOGLE = 100;



    /**
     * Undocumented variable
     *
     * @var EntityManager
     */
    private $entityManager;

    /**
     * Undocumented variable
     *
     * @var AuthenticationService 
     */
    private $auth;


    /**
     * Undocumented variable
     *
     * @var Settings
     */
    private $settings;

    private Client $elasticClient;



    /**
     * Get undocumented variable
     *
     * @return  EntityManager
     */
    public function getEntityManager()
    {
        return $this->entityManager;
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
     * Get undocumented variable
     *
     * @return  AuthenticationService
     */
    public function getAuth()
    {
        return $this->auth;
    }

    /**
     * Set undocumented variable
     *
     * @param  AuthenticationService  $auth  Undocumented variable
     *
     * @return  self
     */
    public function setAuth(AuthenticationService $auth)
    {
        $this->auth = $auth;

        return $this;
    }

    /**
     * Get undocumented variable
     *
     * @return  Settings
     */
    public function getSettings()
    {
        return $this->settings;
    }

    /**
     * Set undocumented variable
     *
     * @param  Settings  $settings  Undocumented variable
     *
     * @return  self
     */
    public function setSettings($settings)
    {
        $this->settings = $settings;

        return $this;
    }

    /**
     * Get the value of elasticClient
     */
    public function getElasticClient()
    {
        return $this->elasticClient;
    }

    /**
     * Set the value of elasticClient
     *
     * @return  self
     */
    public function setElasticClient($elasticClient)
    {
        $this->elasticClient = $elasticClient;

        return $this;
    }
}
