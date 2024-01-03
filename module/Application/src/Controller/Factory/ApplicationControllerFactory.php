<?php
namespace Application\Controller\Factory;

use Application\Controller\ApplicationController;
use Laminas\ServiceManager\Factory\FactoryInterface;
use Psr\Container\ContainerInterface;

class ApplicationControllerFactory implements FactoryInterface{

    public function __invoke(ContainerInterface $container, $requestedName, ?array $options = null)
    {
        $ctr = new ApplicationController();
        return $ctr;
    }
}