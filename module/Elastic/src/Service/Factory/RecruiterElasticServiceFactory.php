<?php

namespace Elastic\Service\Factory;

use Elastic\Service\RecruiterElasticService;
use General\Service\GeneralService;
use Laminas\ServiceManager\Factory\FactoryInterface;
use Psr\Container\ContainerInterface;

class RecruiterElasticServiceFactory implements FactoryInterface
{

    public function __invoke(ContainerInterface $container, $requestedName, ?array $options = null)
    {
        $xserv = new RecruiterElasticService();
        /**
         * @var GeneralService
         */
        $generalService = $container->get(GeneralService::class);
        $xserv->setElasticClient($generalService->getElasticClient());
        return $xserv;
    }
}
