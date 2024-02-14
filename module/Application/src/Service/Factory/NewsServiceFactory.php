<?php

namespace Application\Service\Factory;

use Application\Service\NewsService;
use General\Service\GeneralService;
use Laminas\ServiceManager\Factory\FactoryInterface;
use Psr\Container\ContainerInterface;

class NewsServiceFactory implements FactoryInterface
{

    public function __invoke(ContainerInterface $container, $requestedName, ?array $options = null)
    {
        $xserv  = new NewsService();
        /**
         * @var GeneralService
         */
        $generalService = $container->get(GeneralService::class);
        $xserv->setEntityManager($generalService->getEntityManager());
        return $xserv;
    }
}
