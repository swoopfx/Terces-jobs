<?php

namespace General\Service\Factory;

use Doctrine\ORM\EntityManager;
use Elastic\Elasticsearch\Client;
use Elasticsearch\ClientBuilder;
use General\Entity\Settings;
use General\Service\GeneralService;
use Laminas\Authentication\AuthenticationService;
use Laminas\ServiceManager\Factory\FactoryInterface;
use Psr\Container\ContainerInterface;

class GeneralServiceFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, ?array $options = null)
    {
        $ctr = new GeneralService();
        /**
         * @var EntityManager
         */
        $entityManager = $container->get(EntityManager::class);
        $authService = $container->get("authentication_service");
        $config = $container->get("config");
        $elasticConfig = $config["elasticsearch"];
        /**
         * @var Client
         */





        try {

            $client = ClientBuilder::create()->setHosts([$elasticConfig["host"]])

                ->build();

            // if ($elasticConfig["is_cloud"]) {
            //     if ($elasticConfig["cloud_auth_type"]["api_auth"]) {
            //         $client = ClientBuilder::create()->setElasticCloudId($elasticConfig["cloud_auth_type"]["cloud_id"])
            //             ->setApiKey($elasticConfig["cloud_auth_type"]["api_cred"]["api_id"], $elasticConfig["cloud_auth_type"]["api_cred"]["api_key"])
            //             ->build();
            //     } else if ($elasticConfig["cloud_auth_type"]["basic_auth"]) {
            //         $client  = ClientBuilder::create()->setElasticCloudId($elasticConfig["cloud_auth_type"]["cloud_id"])
            //             ->setBasicAuthentication($elasticConfig["cloud_auth_type"]["basic_cred"]["username"], $elasticConfig["cloud_auth_type"]["basic_cred"]["password"])
            //             ->build();
            //     }
            // }
        } catch (\Throwable $th) {
            throw new \Exception("Could not connect to elasticsearch");
        }
       

        // $settings = $entityManager->find(Settings::class, 100);
        $settings = "";
        $ctr->setEntityManager($entityManager)
            ->setAuth($authService)
            ->setSettings($settings)
            ->setElasticClient($client);
        return $ctr;
    }
}
