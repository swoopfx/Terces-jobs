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


    const POSTED_JOB_INDEX = "posted_job_testx";


    public function createJob($body)
    {
        // var_dump($this->elasticClient->info());
        $elasticClienet = $this->elasticClient;
       $result = $elasticClienet->indices()->create([
            "index" => self::POSTED_JOB_INDEX,
            // "id" => $body['uuid'],
            "body" => $body
            // "body"=>[
            //     "uuid"=>$body['uuid'],
            //     "test"=>"THis test"
            // ]
        ]);
        // $result = $elasticClienet->index();
        return $result;
    }

    public function createJobPosition($body)
    {
        $elasticClienet = $this->elasticClient;
        $result = $elasticClienet->index([
            "index" => "job_position",
            "id" => $body['uuid'],
            "body" => $body
        ]);
        return $result;
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
