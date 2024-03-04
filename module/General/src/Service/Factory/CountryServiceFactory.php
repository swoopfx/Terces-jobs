<?php

namespace General\Service\Factory;

use General\Service\CountryService;
use Laminas\ServiceManager\Factory\FactoryInterface;
use Psr\Container\ContainerInterface;

class CountryServiceFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, ?array $options = null)
    {
        $xser = new CountryService();
        return $xser;
    }
}
