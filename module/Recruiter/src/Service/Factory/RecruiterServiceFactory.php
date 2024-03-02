<?php
namespace Recruiter\Service\Factory;

use Elastic\Service\BaseElastic;
use Elastic\Service\RecruiterElasticService;
use General\Service\GeneralService;
use Laminas\ServiceManager\Factory\FactoryInterface;
use Psr\Container\ContainerInterface;
use Recruiter\Service\RecruiterService;

class RecruiterServiceFactory implements FactoryInterface{

    public function __invoke(ContainerInterface $container, $requestedName, ?array $options = null)
    {
        $xserv = new RecruiterService();
        $generalService = $container->get(GeneralService::class);
        // $recruiterElastic = $container->get(BaseElastic::class);
        // var_dump($recruiterElastic->getinfo());
        return $xserv;
    }
}