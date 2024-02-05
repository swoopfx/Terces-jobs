<?php

/**
 * This file determines the navigation of the application ,
 * works with ACL
 *
 */

use Actors\Controller\ActorsController;
use Actors\Controller\AdminController;
use Actors\Controller\HubSupervisorController;
use Actors\Controller\SuperAdminController;
use Actors\Controller\TrashbusterController;
use Actors\Controller\WalletController;

return [
    'navigation' => [
        // 'default' => [
        //     [ // Begining Hone tab
        //         'label' => ' Home ',
        //         'route' => 'actor',
        //         'resource' => AdminController::class,
        //         'pages' => [ // Begining Offer sub Tab
        //             // [
        //             //     'label' => 'DashBoard',
        //             //     'route' => 'super-admin',
        //             //     'controller' => SuperAdminController::class,
        //             //     'action' => 'dashboard',
        //             //     'resource' => SuperAdminController::class,
        //             //     'privilege' => 'dashboard',
        //             //     'params' => [
        //             //         'action' => 'dashboard'
        //             //     ]

        //             // ],
        //             // [
        //             //     'label' => 'DashBoard',
        //             //     'route' => 'a-admin',
        //             //     'controller' => AdminController::class,
        //             //     'action' => 'dashboard',
        //             //     'resource' => AdminController::class,
        //             //     'privilege' => 'dashboard',
        //             //     'params' => [
        //             //         'action' => 'dashboard'
        //             //     ]

        //             // ],
        //             [
        //                 'label' => 'DashBoard',
        //                 'route' => 'supervisor',
        //                 'controller' => HubSupervisorController::class,
        //                 'action' => 'dashboard',
        //                 'resource' => HubSupervisorController::class,
        //                 'privilege' => 'dashboard',
        //                 'params' => [
        //                     'action' => 'dashboard'
        //                 ]

        //             ],
        //             // [
        //             //     'label' => 'Invoices',
        //             //     'route' => 'invoice'
        //             //     // 'params' => [
        //             //     // 'action' => 'index'
        //             //     // ]
        //             // ],
        //             // [
        //             //     'label' => 'View All Property',
        //             //     // 'route' => 'proparty/default',
        //             //     'params' => [
        //             //         'action' => 'all'
        //             //     ]
        //             // ],
        //             // [
        //             //     'label' => 'Messages',
        //             //     // 'route' => 'messages/default',
        //             //     'params' => [
        //             //         'action' => 'index'
        //             //     ]
        //             // ]

        //             // [
        //             // 'label' => 'Non-Electronic Payments',
        //             // 'route' => 'payment/default',
        //             // 'params' => [
        //             // 'action' => 'view-manual-payment'
        //             // ]
        //             // ],
        //         ]
        //     ],


        //     // End of Offer sub Tab
        //     // End home Tab

        //     [ // Begining Customer tab
        //         'label' => ' Users',
        //         'route' => 'actor',

        //         'pages' => [ // Begining Offer sub Tab
        //             [
        //                 'label' => 'New Customer',
        //                 'route' => 'actor',
        //                 'controller' => ActorsController::class,
        //                 'action' => 'new-customer',
        //                 'resource' => ActorsController::class,
        //                 'privilege' => 'new-customer',
        //                 'params' => [
        //                     'action' => 'new-customer'
        //                 ]

        //             ],
        //             [
        //                 'label' => 'Customer List',
        //                 'route' => 'actor',
        //                 'action' => 'all-customers',
        //                 'resource' => ActorsController::class,
        //                 'params' => [
        //                     'action' => 'all-customers'
        //                 ]
        //             ],

        //             [
        //                 'label' => 'Upgrade Request',
        //                 'route' => 'actor',
        //                 'action' => 'dori-upgrade-requests',
        //                 'resource' => ActorsController::class,
        //                 'params' => [
        //                     'action' => 'dori-upgrade-requests'
        //                 ]
        //             ],
        //             [
        //                 'label' => 'Dori Host List',
        //                 'route' => 'actor',
        //                 'action' => 'all-dori-host',
        //                 'resource' => ActorsController::class,

        //                 'params' => [
        //                     'action' => 'all-dori-host'
        //                 ]
        //             ],

        //             // [
        //             //     'label' => 'New Scavenger',
        //             //     'route' => 'actor',
        //             //     'action' => 'dori-upgrade-requests',
        //             //     'resource' => ActorsController::class,
        //             //     'params' => [
        //             //         'action' => 'dori-upgrade-requests'
        //             //     ]
        //             // ],
        //             // [
        //             //     'label' => 'Scavenger List',
        //             //     'route' => 'actor',
        //             //     'action' => 'dori-upgrade-requests',
        //             //     'resource' => ActorsController::class,
        //             //     'params' => [
        //             //         'action' => 'dori-upgrade-requests'
        //             //     ]
        //             // ],

        //             [
        //                 'label' => 'New TrashBuster',
        //                 'route' => 'buster',
        //                 'action' => 'create-buster',
        //                 'resource' => TrashbusterController::class,
        //                 'params' => [
        //                     'action' => 'create-buster'
        //                 ]
        //             ],
        //             [
        //                 'label' => 'TrashBuster List',
        //                 'route' => 'buster',
        //                 'action' => 'all-buster',
        //                 'resource' => TrashbusterController::class,
        //                 'params' => [
        //                     'action' => 'all-buster'
        //                 ]
        //             ],

        //             // [
        //             //     'label' => 'New Admin',
        //             //     'route' => 'actor',
        //             //     'action' => 'dori-upgrade-requests',
        //             //     'resource' => ActorsController::class,
        //             //     'params' => [
        //             //         'action' => 'dori-upgrade-requests'
        //             //     ]
        //             // ],



        //             // [
        //             //     'label' => 'View All Property',
        //             //     // 'route' => 'proparty/default',
        //             //     'params' => [
        //             //         'action' => 'all'
        //             //     ]
        //             // ],
        //             // [
        //             //     'label' => 'Messages',
        //             //     // 'route' => 'messages/default',
        //             //     'params' => [
        //             //         'action' => 'index'
        //             //     ]
        //             // ]

        //             // [
        //             // 'label' => 'Non-Electronic Payments',
        //             // 'route' => 'payment/default',
        //             // 'params' => [
        //             // 'action' => 'view-manual-payment'
        //             // ]
        //             // ],
        //         ]
        //     ],


        //     [
        //         'label' => 'Wallet',
        //         'route' => 'a-wallet',
        //         'pages' => [
        //             [
        //                 'label' => 'Cash Out Request',
        //                 'route' => 'a-wallet',
        //                 'controller' => WalletController::class,
        //                 'action' => 'cashout-requests',
        //                 'resource' => WalletController::class,
        //                 'privilege' => 'cashout-requests',
        //                 'params' => [
        //                     'action' => 'cashout-requests'
        //                 ]

        //             ],
        //         ]
        //     ],
        //     // End Customer Tab

        //     // Begin Waste Tab
        //     [
        //         'label' => 'Waste',
        //         'route' => 'actor',
        //         'pages' => [

        //             [
        //                 'label' => 'View All',
        //                 'route' => 'waste',
        //                 'params' => [
        //                     'action' => 'view-all-request'
        //                 ]
        //             ],

        //             [
        //                 'label' => 'Pick Up',
        //                 'route' => 'waste',
        //                 'params' => [
        //                     'action' => 'view-all-pickup-request'
        //                 ]
        //             ],

        //             [
        //                 'label' => 'Drop Off',
        //                 'route' => 'waste',
        //                 'params' => [
        //                     'action' => 'view-all-drop-off-request'
        //                 ]
        //             ],

        //             [
        //                 'label' => 'Posted Waste',
        //                 'route' => 'waste',
        //                 'params' => [
        //                     'action' => 'posted-waste-list'
        //                 ]
        //             ],
        //             // [
        //             //     'label' => 'Generate Policy',
        //             //     'route' => 'waste',
        //             //     "params" => [
        //             //         "action" => "posted-waste-details"
        //             //     ]
        //             // ]
        //         ]
        //     ],

        //     // End Waste Tab





        //     // [
        //     // 'label' => 'View Company Policies',
        //     // 'route' => 'policy/default',
        //     // 'params' => [
        //     // 'action' => 'company-policy'
        //     // ]
        //     // ]

        //     // [ // Begining Ofer Tab
        //     // 'label' => '<i class=" fa fa-folder-open"></i> Quote <span class="fa fa-chevron-down"></span> ',
        //     // 'route' => 'offer',
        //     // 'pages' => [ // Begining Offer sub Tab
        //     // [
        //     // 'label' => 'View Active Quote',
        //     // 'route' => 'offer/default'
        //     // ]
        //     // ]
        //     // ],
        //     // 'params' => [
        //     // 'action' => 'index'
        //     // ]

        //     // [
        //     // 'label' => ' Make New Offer',
        //     // 'route' => 'offer/default',

        //     // 'params' => [
        //     // 'action' => 'offer-information'
        //     // ]
        //     // ]

        //     // [
        //     // 'label' => ' Help',
        //     // 'route' => 'offer/default',

        //     // 'params' => [
        //     // 'action' => 'help'
        //     // ]
        //     // ]





        //     [
        //         'label' => 'Shop',
        //         'route' => 'shop',
        //         'pages' => [
        //             // [
        //             //     'label' => 'Overview',
        //             //     'route' => 'shop',
        //             //     "params" => [
        //             //         "action" => "overview"
        //             //     ]
        //             // ],
        //             [
        //                 'label' => 'New Product',
        //                 'route' => 'shop',
        //                 "params" => [
        //                     "action" => "create-product"
        //                 ]
        //             ],

        //             [
        //                 'label' => 'Product List', // this is for brokers
        //                 'route' => 'shop',
        //                 'params' => [
        //                     'action' => 'product-list'
        //                 ]
        //             ],

        //             [
        //                 'label' => 'Order List', // this is for brokers
        //                 'route' => 'shop',
        //                 'params' => [
        //                     'action' => 'order-list'
        //                 ]
        //             ]
        //         ]
        //     ],

        //     [ // Begining Ofer Tab
        //         'label' => ' Settings',
        //         'route' => 'settings',
        //         'pages' => [ // Begining Offer sub Tab

        //             [
        //                 'label' => 'New Staff',
        //                 'route' => 'a-admin',
        //                 'params' => [
        //                     'action' => 'new-staff'
        //                 ]
        //             ],

        //             [
        //                 'label' => 'Search Customer',
        //                 'route' => 'a-admin',
        //                 'params' => [
        //                     'action' => 'search-customer'
        //                 ]
        //             ],

        //             [
        //                 'label' => 'Search Dori Host',
        //                 'route' => 'a-admin',
        //                 'params' => [
        //                     'action' => 'search-dorihost'
        //                 ]
        //             ],

        //             [
        //                 'label' => 'Search Staff',
        //                 'route' => 'a-admin',
        //                 'params' => [
        //                     'action' => 'search-buster'
        //                 ]
        //             ],


        //             [
        //                 'label' => 'General Setting',
        //                 'route' => 'settings',
        //                 'params' => [
        //                     'action' => 'general'
        //                 ]
        //             ],

        //             [
        //                 'label' => 'Hub Location',
        //                 'route' => 'settings',
        //                 'params' => [
        //                     'action' => 'hub-locations'
        //                 ]
        //             ],

        //             [
        //                 'label' => ' Hub Supervisors',
        //                 'route' => 'settings',
        //                 'params' => [
        //                     'action' => 'hub-supervisors'
        //                 ]
        //             ],

        //             [
        //                 'label' => 'Create Hub Supervisor',
        //                 'route' => 'settings',
        //                 'params' => [
        //                     'action' => 'create-hub-supervisor'
        //                 ]
        //             ],

        //             [
        //                 'label' => 'Create Admin',
        //                 'route' => 'settings',
        //                 'params' => [
        //                     'action' => 'create-admin'
        //                 ]
        //             ],

        //             [
        //                 'label' => 'Admin List',
        //                 'route' => 'settings',
        //                 'params' => [
        //                     'action' => 'admin-list'
        //                 ]
        //             ],

        //             [
        //                 'label' => 'ACL Resource',
        //                 'route' => 'settings',

        //                 'params' => [
        //                     'action' => 'add-acl-resources'
        //                 ]
        //             ],

        //             [
        //                 'label' => 'Acl Priviledges',
        //                 'route' => 'settings',
        //                 'resource' => AdminController::class,
        //                 'privilege' => 'add-acl-priviledges',
        //                 'params' => [
        //                     'action' => 'add-acl-priviledges'
        //                 ]
        //             ]
        //         ]
        //     ],

        //     // [ // Begining Ofer Tab
        //     // 'label' => '<i class=" fa fa-plus-square"></i> Packages <span class="fa fa-chevron-down"></span> ',
        //     // 'route' => 'packages',
        //     // 'pages' => [ // Begining Offer sub Tab
        //     // [
        //     // 'label' => 'Create Package',
        //     // 'route' => 'packages/default',
        //     // 'params' => [
        //     // 'action' => 'create'
        //     // ]
        //     // ],

        //     // [
        //     // 'label' => 'View All Package',
        //     // 'route' => 'packages/default',
        //     // 'params' => [
        //     // 'action' => 'all'
        //     // ]
        //     // ],

        //     // [
        //     // 'label' => 'Feature Packages',
        //     // 'route' => 'packages/default',
        //     // 'params' => [
        //     // 'action' => 'featured'
        //     // ]
        //     // ],

        //     // [
        //     // 'label' => 'Acquired Packages',
        //     // 'route' => 'acquired-packages/default',
        //     // 'params' => [
        //     // 'action' => 'index'
        //     // ]
        //     // ]
        //     // ]
        //     // ],

        //     // [ // Begining Ofer Tab
        //     //     'label' => '<i class=" fa fa-edit"></i> Proposals <span class="fa fa-chevron-down"></span> ',
        //     //     'route' => 'proposal',
        //     //     'pages' => [ // Begining Offer sub Tab

        //     //         // [
        //     //         // 'label' => 'Proposals',
        //     //         // 'route' => 'proposal/default',
        //     //         // 'params' => [
        //     //         // 'action' => 'create'
        //     //         // ]
        //     //         // ],

        //     //         // [
        //     //         // 'label' => 'Generate Proposals',
        //     //         // 'route' => 'proposal/default',
        //     //         // 'params' => [
        //     //         // 'action' => 'create'
        //     //         // ]
        //     //         // ],
        //     //         // 'params' => [
        //     //         // 'action' => 'index'
        //     //         // ]

        //     //         [
        //     //             'label' => 'My Proposals ',
        //     //             'route' => 'proposal/default',
        //     //             'params' => [
        //     //                 'action' => 'my-proposals'
        //     //             ]
        //     //         ]
        //     //     ]
        //     // ],
        //     // [
        //     // 'label' => ' View company Proposals',
        //     // 'route' => 'proposal/default',
        //     // 'params' => [
        //     // 'action' => 'create'
        //     // ]
        //     // ]

        //     // End of Offer sub Tab
        //     // [
        //     // 'label' => '<i class="fa fa-line-chart"></i> Report <span class="fa fa-chevron-down"></span> ',
        //     // 'uri' => '#',
        //     // 'pages' => [
        //     // [
        //     // 'label' => 'View Report',
        //     // 'route' => 'report'
        //     // ]
        //     // ]
        //     // ],



        //     // [ // Begin Agennt Tools tabs
        //     //     'label' => '<i class="fa fa-cloud"></i>Analyzer <span class="fa fa-chevron-down"></span>',
        //     //     'uri' => '#',
        //     //     'pages' => [
        //     //         [
        //     //             'label' => 'Business Analysis',
        //     //             'route' => 'analytics/default',
        //     //             "params" => [
        //     //                 "action" => "business"
        //     //             ]
        //     //         ],
        //     //         [
        //     //             'label' => 'Consumer Analysis',
        //     //             'route' => 'analytics/default',
        //     //             "params" => [
        //     //                 "action" => "consumer"
        //     //             ]
        //     //         ],
        //     //         [
        //     //             'label' => 'Risk Analysis',
        //     //             'route' => 'analytics/default',
        //     //             "params" => [
        //     //                 "action" => "risk"
        //     //             ]
        //     //         ]
        //     //     ]
        //     // ],

        //     // [
        //     // 'label' => '<i class="fa fa-gears"></i>Brokers Tools <span class="fa fa-chevron-down"></span>',
        //     // 'uri' => '#',
        //     // 'pages' => [
        //     // // [
        //     // // 'label' => 'Process Documents',
        //     // // 'route' => 'brokers-tool'
        //     // // ],
        //     // // [
        //     // // 'label' => 'Process Objects',
        //     // // 'route' => 'brokers-tool'
        //     // // ],
        //     // [
        //     // 'label' => 'Send SMS',
        //     // 'route' => 'brokers-tool'
        //     // ],
        //     // [
        //     // 'label' => 'Add Customer Object',
        //     // 'route' => 'object/default',
        //     // 'params' => [
        //     // 'action' => 'new'
        //     // ]
        //     // ],

        //     // ]
        //     // ],

        //     // [
        //     //     'label' => '<i class="fa fa-wrench"></i>Settings <span class="fa fa-chevron-down"></span>',
        //     //     'uri' => '#',
        //     //     'resource' => 'Settings\Controller\Settings',
        //     //     'privilege' => 'index',
        //     //     'pages' => [

        //     //         [
        //     //             'label' => 'Wallet',
        //     //             "action" => "overview",
        //     //             "controller" => "Wallet",
        //     //             'route' => 'wallet',
        //     //             'resource' => 'Wallet\Controller\Wallet',
        //     //             // 'privilege' => 'pr',
        //     //             "params" => [
        //     //                 "action" => "overview"
        //     //             ]
        //     //         ],

        //     //         [
        //     //             'label' => 'Company Profile',
        //     //             "action" => "profile",
        //     //             "controller" => "Settings",
        //     //             'route' => 'user_broker',
        //     //             'resource' => 'Settings\Controller\Settings',
        //     //             'privilege' => 'profile',
        //     //             "params" => [
        //     //                 "action" => "info"
        //     //             ]
        //     //         ],
        //     //         [
        //     //             'label' => 'Company Bank Account',
        //     //             'route' => 'settings/default',
        //     //             'resource' => 'Settings\Controller\Settings',
        //     //             'privilege' => 'profile',
        //     //             'params' => [
        //     //                 'action' => 'broker-bank-account'
        //     //             ]
        //     //         ],
        //     //         [
        //     //             'label' => 'Buy SMS Credit',
        //     //             'route' => 's-m-s/default',
        //     //             'resource' => 'Settings\Controller\Settings',
        //     //             'privilege' => 'profile',
        //     //             'params' => [
        //     //                 'action' => 'buy-sms'
        //     //             ]
        //     //         ],
        //     //         [
        //     //             'label' => 'Staff',
        //     //             'route' => 'brokers-tool/default',
        //     //             'params' => [
        //     //                 'action' => 'add-staff'
        //     //             ]
        //     //         ],

        //     //         [
        //     //             'label' => 'Web Config',
        //     //             "action" => "webconfig",
        //     //             "controller" => "Settings",
        //     //             'route' => 'settings/default',
        //     //             'resource' => 'Settings\Controller\Settings',
        //     //             'privilege' => 'profile',
        //     //             "params" => [
        //     //                 "action" => "info"
        //     //             ]
        //     //         ]
        //     //         // [
        //     //         // 'label' => 'Setup Payment Gateway',
        //     //         // 'route' => 'brokers-tool/default',
        //     //         // 'params' => [
        //     //         // 'action' => 'brokerflutterwave'
        //     //         // ]
        //     //         // ],
        //     //     ]
        //     // ]
        // ],



    ],

    'service_manager' => [
        'factories' => [
            // 'navigation' => 'Laminas\Navigation\Service\DefaultNavigationFactory'
        ]
    ]
];
