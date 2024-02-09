<?php

namespace Admin\Controller\Factory;

use Admin\Controller\AppController;
use General\Service\GeneralService;
use General\Service\UploadService;
use Laminas\ServiceManager\Factory\FactoryInterface;
use Psr\Container\ContainerInterface;

class AppControllerFactory implements FactoryInterface
{

    public function __invoke(ContainerInterface $container, $requestedName, ?array $options = null)
    {
        $ctr = new AppController();
        /**
         * @var GeneralService
         */
        $generalService = $container->get(GeneralService::class);
        $uploadService = $container->get(UploadService::class);

        $ctr->setEntityManager($generalService->getEntityManager())
            ->setUploadService($uploadService);
        return $ctr;
    }
}
