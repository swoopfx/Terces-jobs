<?php

namespace Navigation;

use Authorization\Acl\Acl;
use Laminas\Mvc\MvcEvent;
use Laminas\Navigation\Navigation;
use Laminas\View\Helper\Navigation as HelperNavigation;
use Laminas\View\HelperPluginManager;

class Module
{
    public function getConfig()
    {
        /** @var array $config */
        $config = include __DIR__ . '/../config/module.config.php';
        return $config;
    }



    public function getViewHelperConfig()
    {


        return [

            "factories" => [

                "navigation" =>  function (HelperPluginManager $pm) {
                    $acl = $pm->get(Acl::class);
                    /**
                     * @var AuthenticationService
                     */
                    $auth = $pm->get("authentication_service");
                    /**
                     * @var Acl
                     */
                    $acl = $pm->get(Acl::class);
                    $role = Acl::DEFAULT_ROLE;

                    // var_dump($auth->hasIdentity());
                    if ($auth->hasIdentity()) {
                        $user = $auth->getIdentity();
                        $role = $user->getRole()->getName();
                    }
                    var_dump($acl);

                    $navigation = $pm->get(HelperNavigation::class);
                    // Store ACL and role in the proxy helper:
                    $navigation->setAcl($acl);
                    $navigation->setRole($role);

                    // Return the new navigation helper instance
                    return $navigation;
                }
            ]

        ];
    }
}
