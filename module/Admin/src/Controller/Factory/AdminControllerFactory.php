<?php
namespace Admin\Controller\Factory;

use Admin\Controller\AdminController;
use General\Service\ActiveCampaignService;
use General\Service\GeneralService;
use General\Service\PostMarkService;
use Laminas\ServiceManager\Factory\FactoryInterface;
use Psr\Container\ContainerInterface;

class AdminControllerFactory implements FactoryInterface{

    public function __invoke(ContainerInterface $container, $requestedName, ?array $options = null)
    {
        $ctr = new AdminController();
        if (!$container->has(ActiveCampaignService::class)) {
            throw new \Exception("Auth Controller cannot retrive Active Campaign Service");
        }
        if (!$container->has(PostMarkService::class)) {
            throw new \Exception("Auth controller could not retrieve postmart Service");
        }
       
        $generalService = $container->get(GeneralService::class);
        $postmarkService = $container->get(PostMarkService::class);
        // $googleService = $container->get(GoogleService::class);
        $ctr->setEntityManager($generalService->getEntityManager())
            ->setAuthService($generalService->getAuth())
            ->setPostmarkService($postmarkService)
            // ->setGoogleService($googleService)
            ->setActiveCampaignService($container->get(ActiveCampaignService::class));
        return $ctr;
    }
}