<?php

namespace Elastic\Service;

use Elasticsearch\Client;

class RecruiterElasticService
{

    /**
     * Undocumented variable
     *
     * @var Client
     */
    private Client $elasticClient;


    public function createJobPosition($body)
    {
        // var_dump($this->elasticClient->info());
        $elasticClienet = $this->elasticClient;
        // $elasticClienet->index([
        //     // "index"=>
        // ]);
        // return $elasticClienet;
    }



    /**
     * Set undocumented variable
     *
     * @param  Client  $elasticClient  Undocumented variable
     *
     * @return  self
     */
    public function setElasticClient(Client $elasticClient)
    {
        $this->elasticClient = $elasticClient;

        return $this;
    }
}
