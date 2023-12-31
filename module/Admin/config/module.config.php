<?php

namespace Admin;

return [
    'view_manager' => [

        'template_map' => [
            "admin-login-layout" => __DIR__ . "/../view/layout/admin_login_layout.phtml",

        ],
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
        // 'strategies' => array(
        //     'ViewJsonStrategy'
        // )
    ],
    "controllers"=>[
        "factories"=>[
            
        ]
    ]
];
