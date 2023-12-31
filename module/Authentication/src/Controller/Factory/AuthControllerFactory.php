<?php

namespace Authentication\Controller\Factory;

use Authentication\Controller\AuthController;
use General\Service\ActiveCampaignService;
use General\Service\GeneralService;
use General\Service\GoogleService;
use General\Service\PostMarkService;
use Laminas\ServiceManager\Factory\FactoryInterface;
use Psr\Container\ContainerInterface;

class AuthControllerFactory implements FactoryInterface
{

    public function __invoke(ContainerInterface $container, $requestedName, ?array $options = null)
    {
        $ctr = new AuthController();
        if (!$container->has(ActiveCampaignService::class)) {
            throw new \Exception("Auth Controller cannot retrive Active Campaign Service");
        }
        if (!$container->has(PostMarkService::class)) {
            throw new \Exception("Auth controller could not retrieve postmart Service");
        }
        if (!$container->has(GoogleService::class)) {
            throw new \Exception("Auth controller could not retrieve Google Service");
        }
        $generalService = $container->get(GeneralService::class);
        $postmarkService = $container->get(PostMarkService::class);
        $googleService = $container->get(GoogleService::class);
        $ctr->setEntityManager($generalService->getEntityManager())
            ->setAuthService($generalService->getAuth())
            ->setPostmarkService($postmarkService)
            ->setGoogleService($googleService)
            ->setActiveCampaignService($container->get(ActiveCampaignService::class));
        return $ctr;
    }
}
