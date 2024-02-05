<?php
namespace Application\Controller\Factory;

use Application\Controller\NewsController;
use Laminas\ServiceManager\Factory\FactoryInterface;
use Psr\Container\ContainerInterface;

class NewsControllerFactory implements FactoryInterface{

    public function __invoke(ContainerInterface $container, $requestedName, ?array $options = null)
    {
        $ctr = new NewsController();
        return $ctr;
    }
}