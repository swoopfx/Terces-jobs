<?php

declare(strict_types=1);

namespace Authorization;

use Authorization\Controller\AclController;
use Authorization\Controller\Plugin\Factory\IsAllowedFactory;
// use Authorization\Controller\Plugin\IsAllowed;
use Authorization\View\Helper\Factory\IsAllowedFactory as FactoryIsAllowedFactory;
// use Authorization\View\Helper\IsAllowed as HelperIsAllowed;
use Doctrine\ORM\Mapping\Driver\AnnotationDriver;
use Laminas\Router\Http\Literal;
use Laminas\ServiceManager\Factory\InvokableFactory;

return [
    'view_manager' => [

        'template_map' => [
            "error-layout" => __DIR__ . "/../view/layout/layout.phtml"
        ],
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
        // 'strategies' => array(
        //     'ViewJsonStrategy'
        // )
    ],
    "router" => [
        "routes" => [
            'acl' => [
                'type' => Literal::class,
                'options' => [
                    'route' => '/acl/access-error',
                    'defaults' => [

                        'controller' => AclController::class,
                        'action' => 'index'
                    ]
                ]
            ],
        ]
    ],
    "controller_plugin" => [
        "factories" => [
            "isAllowed" => IsAllowedFactory::class,
        ]
    ],
    "controllers" => [
        "factories" => [
            AclController::class => InvokableFactory::class
        ]
    ],
    "view_helpers" => [
        "factories" => [
            "isAllowed" => FactoryIsAllowedFactory::class
        ]
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
        ],
    ],


    "service_manager" => [
        "factories" => [
            "Authorization\Acl\Acl" => "Authorization\Acl\Factory\AclFactory"
        ],
        "aliases" => [
            "acl_service" => "Authorization\Acl\Acl"
        ]
    ],

];
