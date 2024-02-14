<?php

namespace Authorization;

use Authentication\Service\AuthenticationService;
use Authorization\Acl\Acl;
use Exception;
use Laminas\Mvc\MvcEvent;
use Laminas\View\Model\JsonModel;

class Module
{
    public function getConfig(): array
    {
        /** @var array $config */
        $config = include __DIR__ . '/../config/module.config.php';
        return $config;
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

        /**
         * @var AuthenticationService
         */
        $auth = $sm->get("authentication_service");
        /**
         * @var Acl
         */
        $acl = $sm->get("Authorization\Acl\Acl");

        $role = Acl::DEFAULT_ROLE;
        $response = $e->getResponse();
        // var_dump($auth->hasIdentity());
        // if ($auth->hasIdentity()) {
        //     $user = $auth->getIdentity();
        //     $role = $user->getRole()->getName();
        // }


        $controller = $routeMatch->getParam("controller");
        $action = $routeMatch->getParam("action");
        $interface = $routeMatch->getParam("interface");

       
        // if (!$acl->hasResource($controller)) {
        //     throw new \Exception("Resource {$controller} not found");
        // }

        // var_dump($acl->isAllowed($role, $controller, $action));
        // exit;
        // if ($action == NULL) {
        //     var_dump("I thisn");
        //     exit;
        // }

        // if (!$acl->isAllowed($role, $controller, $action)) {
        //     // var_dump($role);
        //     // var_dump($controller);
        //     // var_dump($action);
        //     // exit;

        //     $config = $sm->get("config");

        //     $redirect_route = $config["acl"]["redirect_route"];

        //     if ($interface != "web") {
        //         $response->setStatusCode(401);
        //         $response->getHeaders()->addHeaderLine('Content-Type', 'application/json');
        //         $response->setContent(json_encode([
        //             "error" => "Unauthorized"
        //         ]));
        //         return $response;
        //     }else if (!empty($redirect_route)) {
        //         // var_dump($role);
        //         $url = $e->getRouter()->assemble($redirect_route["params"], $redirect_route["options"]);
        //         $response->getHeaders()->addHeaderLine("Location", $url);


        //         $response->setStatusCode(302);
        //         $response->sendHeaders();

        //         exit;
        //     } else {

        //         $response->setStatusCode(401);
        //         $response->getHeaders()->addHeaderLine('Content-Type', 'application/json');
        //         $response->setContent(json_encode([
        //             "error" => "Unauthorized"
        //         ]));
        //         return $response;
        //     }
        // }
    }
}
