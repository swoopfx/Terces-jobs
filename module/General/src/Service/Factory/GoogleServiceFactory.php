<?php

namespace General\Service\Factory;

use General\Service\GoogleService;
use Google_Client;
use Laminas\ServiceManager\Factory\FactoryInterface;
use Psr\Container\ContainerInterface;

class GoogleServiceFactory implements FactoryInterface
{

    public function __invoke(ContainerInterface $container, $requestedName, ?array $options = null)
    {
        $xserv = new GoogleService();
        $googleClient = new Google_Client();
        $config = $container->get("config");
        $google = $config["google"]["dev"]["web"];
        $googleClient->setClientId($google["client_id"]);
        $googleClient->setClientSecret($google["client_secret"]);
        $googleClient->setRedirectUri($google["redirect_uri"]);
        $googleClient->addScope("profile");
        $googleClient->addScope("email");
        
        $xserv->setGoogleClient($googleClient);
        return $xserv;
    }
}
