<?php

namespace Recruiter;


use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Mapping\Driver\AnnotationDriver;
use Laminas\Router\Http\Segment;
use Recruiter\Controller\Factory\RecruiterControllerFactory;
use Recruiter\Controller\RecruiterController;

return [
    'controllers' => [
        'factories' => [
            RecruiterController::class => RecruiterControllerFactory::class
        ],
        "aliases" => [
            "recruiter" => RecruiterController::class
        ]
    ],
    'view_manager' => [

        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
        'template_map' => [
            'recruiter-layout'           => __DIR__ . '/../view/layout/recruiterLayout.phtml',
            "recruiterPartial-basic-form-job-info" => __DIR__ . '/../view/partial/basic-form-job-info.phtml',
            "recruiterPartial-job-description-form" => __DIR__ . '/../view/partial/job-description-form.phtml',
            
        ]

    ],
    'router' => [
        'routes' => [


            // 'app' => [
            //     'type'    => Segment::class,
            //     'options' => [
            //         'route'    => '/app[/:controller[/:action[/:id]]]',
            //         'constraints' => [
            //             'interface'=>"",
            //             'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
            //             'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
            //             'id' => '[a-zA-Z0-9]*'
            //         ],

            //         'defaults' => [
            //             'controller' => ApplicationController::class,
            //             'action'     => 'index',
            //             'id' => '[a-zA-Z0-9]*'
            //         ],
            //     ],
            // ],

            'recruiter' => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '/recruit[/:controller[/:interface[/:action[/:id]]]]',
                    'constraints' => [
                        'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'interface' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id' => '[a-zA-Z0-9]*'
                    ],
                    'defaults' => [
                        'controller' => RecruiterController::class,
                        "interface" => "web",
                        'action'     => 'index',
                    ],
                ],
            ],
        ],
    ],
    'doctrine' => [

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
