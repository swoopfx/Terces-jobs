<?php

namespace General\Service;

use Google_Client;

class GoogleService
{
    /**
     * Undocumented variable
     *
     * @var Google_Client
     */
    private $googleClient;


    /**
     * Set the value of googleClient
     *
     * @return  self
     */
    public function setGoogleClient($googleClient)
    {
        $this->googleClient = $googleClient;

        return $this;
    }

    /**
     * Get undocumented variable
     *
     * @return  Google_Client
     */
    public function getGoogleClient()
    {
        return $this->googleClient;
    }
}
