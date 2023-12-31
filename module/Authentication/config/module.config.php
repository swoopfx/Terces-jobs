<?php

namespace Authentication;

use Authentication\Controller\AuthController;
use Authentication\Controller\Factory\AuthControllerFactory;
use Authentication\Controller\Factory\RecruiterControllerFactory;
use Authentication\Controller\RecruiterController;
use Authentication\Service\Factory\AuthenticationFactory;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Mapping\Driver\AnnotationDriver;
use Doctrine\ORM\Mapping\Entity;
use Laminas\Router\Http\Literal;
use Laminas\Router\Http\Segment;

return [
    "service_manager" => [
        "factories" => [
            "Laminas\Authentication\AuthenticationService" => AuthenticationFactory::class,
        ],
        "aliases" => [

            "authentication_service" => "Laminas\Authentication\AuthenticationService"
        ]
    ],
    'router' => [
        'routes' => [
            'authentication' => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '/a[/:controller[/:action[/:id]]]',
                    'constraints' => [
                        'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id' => '[a-zA-Z0-9]*'
                    ],

                    'defaults' => [
                        '__NAMESPACE__' => 'Application\Controller',
                        'controller' => AuthController::class,
                        'action'     => 'login',
                        'id' => '[a-zA-Z0-9]*'
                    ],
                ],
            ],

            'login' => [
                'type'    => Literal::class,
                'options' => [
                    'route'    => '/login',
                    'constraints' => [
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        // 'id' => '[a-zA-Z0-9]*'
                    ],
                    'defaults' => [
                        'controller' => AuthController::class,
                        'action'     => 'login',
                    ],
                ],
            ],

            'register' => [
                'type'    => Literal::class,
                'options' => [
                    'route'    => '/register',
                    'constraints' => [
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        // 'id' => '[a-zA-Z0-9]*'
                    ],
                    'defaults' => [
                        'controller' => AuthController::class,
                        'action'     => 'register',
                    ],
                ],
            ],

            'logout' => [
                'type' => Literal::class,
                'options' => [
                    'route' => '/logout',
                    'defaults' => [

                        'controller' => AuthController::class,
                        'action' => 'logout'
                    ]
                ]
            ],
        ]
    ],
    'view_manager' => [

        'template_map' => [
            "login-layout" => __DIR__ . "/../view/layout/login_layout.phtml",
            "register_form_partial" => __DIR__ . "/../view/authentication/partial/register_form_partial.phtml",
        ],
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
        // 'strategies' => array(
        //     'ViewJsonStrategy'
        // )
    ],
    "controllers" => [
        "factories" => [
            AuthController::class => AuthControllerFactory::class,
            RecruiterController::class => RecruiterControllerFactory::class,
        ],
        "aliases" => [
            "auth" => AuthController::class,
            "recruiter" => RecruiterController::class,
        ]
    ],

    'doctrine' => [
        'configuration' => [
            'orm_default' => [
                'generate_proxies' => true
            ]
        ],
        'authentication' => [
            'orm_default' => [
                'object_manager' => EntityManager::class,
                'identity_class' => "Authentication\Entity\User",
                'identity_property' => 'email',
                'credential_property' => 'password',
                'credential_callable' => "Authentication\Service\UserService::verifyHashedPassword"
            ],
        ],

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
    ],
];
