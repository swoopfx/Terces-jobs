<?php

namespace Admin;

use Admin\Controller\AdminController;
use Admin\Controller\AppController;
use Admin\Controller\Factory\AdminControllerFactory;
use Admin\Controller\Factory\AppControllerFactory;
use Application\Controller\Factory\ResumeControllerFactory;
use Application\Controller\ResumeController;
use Laminas\Router\Http\Segment;

return [
    'view_manager' => [

        'template_map' => [
            "admin-login-layout" => __DIR__ . "/../view/layout/admin_login_layout.phtml",
            "admin-layout" => __DIR__ . "/../view/layout/admin_layout.phtml",

        ],
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
        // 'strategies' => array(
        //     'ViewJsonStrategy'
        // )
    ],
    'router' => [
        'routes' => [
            'admin' => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '/admin[/:controller[/:interface[/:action[/:id]]]]',
                    'constraints' => [
                        'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'interface' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id' => '[a-zA-Z0-9_-]*'
                    ],

                    'defaults' => [
                        'controller' => AdminController::class,
                        "interface" => "web",
                        'action'     => 'login',
                        'id' => '[a-zA-Z0-9]*'
                    ],
                ],
            ],

        
        ]
    ],
    "controllers" => [
        "factories" => [
            AdminController::class => AdminControllerFactory::class,
            AppController::class => AppControllerFactory::class,
            ResumeController::class=>ResumeControllerFactory::class
        ],
        "aliases" => [
            "admin" => AdminController::class,
            "app"=>AppController::class,
            "resume"=>ResumeController::class
        ]
    ]
];
