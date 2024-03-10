<?php

namespace Recruiter;

use General\Service\GeneralService;
use Laminas\ModuleManager\ModuleManager;
use Laminas\Mvc\MvcEvent;
use Laminas\Session\Container;

;


class Module
{
    public function getConfig(): array
    {
        /** @var array $config */
        $config = include __DIR__ . '/../config/module.config.php';
        return $config;
    }

    public function init(ModuleManager $moduleManager)
    {
        $sharedEvent = $moduleManager->getEventManager()->getSharedManager();
        $sharedEvent->attach(__NAMESPACE__, 'dispatch', function ($e) {
            $controller = $e->getTarget();
            $controller->layout('recruiter-layout');
        });
    }

    public function onBootstrap(MvcEvent $e)
    {
        $application = $e->getApplication();
        $eventManager = $application->getEventManager();
        $eventManager->attach("route", [$this, 'onRoute'], -100);
    }


    public function onRoute(MvcEvent $e)
    {
        $application = $e->getApplication();
        $routeMatch = $e->getRouteMatch();
        $sm = $application->getServiceManager(); // service Manager
        $generalService = $sm->get(GeneralService::class);
        $response = $e->getResponse();
        $request = $e->getRequest();
        $authService = $generalService->getAuth();
        $cont = new Container("refer");

        

        // var_dump( $routeMatch->getMatchedRouteName());
        if ($routeMatch->getMatchedRouteName() == "recruiter") {
            if (!$authService->hasIdentity()) {
                // $cont->refer = "/recruit";
                $response->setStatusCode(301);
                // $referContainer->location = $request->getUriString();
                $controller = $e->getTarget();
                $uri = $request->getUri();
                $fullLink = sprintf('%s://%s', $uri->getScheme(), $uri->getHost());

                $response->getHeaders()->addHeaderLine('Location', $fullLink . "/login");

                // $e->stopPropagation();
            }
        }
    }
}
