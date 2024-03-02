<?php

namespace Elastic;

use Elastic\Service\BaseElastic;
use Elastic\Service\Factory\BaseElasticFactory;
use Elastic\Service\RecruiterElasticService;
use Elastic\Service\Factory\RecruiterElasticServiceFactory;

return [
    "service_manager" => [
        "factories" => [
            // BaseElastic::class => BaseElasticFactory::class,
            RecruiterElasticService::class => RecruiterElasticServiceFactory::class
        ],
        "aliases" => []
    ]
];
