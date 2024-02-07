<?php

declare(strict_types=1);

namespace Application;

use Application\Controller\ApplicationController;
use Application\Controller\Factory\ApplicationControllerFactory;
use Application\Controller\Factory\NewsControllerFactory;
use Application\Controller\IndexController;
use Application\Controller\NewsController;
use Doctrine\ORM\Mapping\Driver\AnnotationDriver;
use Laminas\Router\Http\Literal;
use Laminas\Router\Http\Segment;
use Laminas\ServiceManager\Factory\InvokableFactory;

return [
    
    'router' => [
        'routes' => [
            'home' => [
                'type'    => Literal::class,
                'options' => [
                    'route'    => '/',
                    'defaults' => [
                        'controller' => Controller\IndexController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
            'apps' => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '/apps[/:controller[/:interface[/:action[/:id]]]]',
                    'constraints' => [
                        'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'interface' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id' => '[a-zA-Z0-9]*'
                    ],

                    'defaults' => [
                        'controller' => IndexController::class,
                        "interface" => "web",
                        'action'     => 'index',
                        'id' => '[a-zA-Z0-9]*'
                    ],
                ],
            ],

            'app' => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '/app[/:controller[/:action[/:id]]]',
                    'constraints' => [
                        'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id' => '[a-zA-Z0-9]*'
                    ],

                    'defaults' => [
                        'controller' => ApplicationController::class,
                        'action'     => 'index',
                        'id' => '[a-zA-Z0-9]*'
                    ],
                ],
            ],
        ],
    ],
    'controllers' => [
        'factories' => [
            Controller\IndexController::class => InvokableFactory::class,
            ApplicationController::class => ApplicationControllerFactory::class,
            NewsController::class => NewsControllerFactory::class
        ],
        "aliases" => [
            "application" => ApplicationController::class,
            "news" => NewsController::class
        ]
    ],
    'view_manager' => [
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_map' => [
            'layout/layout'           => __DIR__ . '/../view/layout/layout.phtml',
            'application/index/index' => __DIR__ . '/../view/application/index/index.phtml',

            //partials
            'application/terces/academy' => __DIR__ . '/../view/partials/application_terces_academy_programs.phtml',

            'error/404'               => __DIR__ . '/../view/error/404.phtml',
            'error/index'             => __DIR__ . '/../view/error/index.phtml',
        ],
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
        'strategies' => array(
            'ViewJsonStrategy'
        )
    ],
    "doctrine" => [
        'driver' => [
            __NAMESPACE__ . '_driver' => [
                'class' => AnnotationDriver::class,
                'cache' => 'array',
                'paths' => [
                    __DIR__ . '/../src/Entity'
                ]
            ],
            'orm_default' => [
                'drivers' => [
                    __NAMESPACE__ . '\Entity' => __NAMESPACE__ . '_driver'
                ]
            ]
        ]
    ]
];
