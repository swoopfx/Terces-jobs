<?php

namespace Recruiter\Controller\Factory;

use Elastic\Service\RecruiterElasticService;
use Recruiter\Controller\RecruiterController;
use General\Service\GeneralService;
use Laminas\ServiceManager\Factory\FactoryInterface;
use Psr\Container\ContainerInterface;

class RecruiterControllerFactory implements FactoryInterface
{

    public function __invoke(ContainerInterface $container, $requestedName, ?array $options = null)
    {

        $ctr = new RecruiterController();
        /**
         * @var GeneralService
         */
        $generalService = $container->get(GeneralService::class);
        $ctr->setEntityManager($generalService->getEntityManager());

        return $ctr;
    }
}
