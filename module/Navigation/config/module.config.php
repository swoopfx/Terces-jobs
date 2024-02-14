<?php

namespace Navigation;

use Doctrine\ORM\Mapping\Driver\AnnotationDriver;

return [
    "view_helpers" => [
       
    ],

    "view_manager" => [
        "template_map" => [
            "navigation-partial" => __DIR__ . '/../view/partial/navigation-partial.phtml',
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

];
