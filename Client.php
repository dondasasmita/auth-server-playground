<?php

require_once 'config.php';

class Client
{
    protected $client_id;
    protected $client_secret;
    protected $redirect_uri;
    protected $grant_types;
    protected $scope;
    protected $user_id;

    public function __construct($client_id)
    {
        $this->client_id = $client_id;
    }


    public function generateSecret()
    {
        $token = bin2hex(random_bytes(32));
        $this->setClientSecret($token);
    }

    /**
     * Get the value of client_id
     */
    public function getClientId()
    {
        return $this->client_id;
    }

    /**
     * Set the value of client_id
     *
     * @return  self
     */
    public function setClientId($client_id)
    {
        $this->client_id = $client_id;

        return $this;
    }

    /**
     * Get the value of client_secret
     */
    public function getClientSecret()
    {
        return $this->client_secret;
    }

    /**
     * Set the value of client_secret
     *
     * @return  self
     */
    public function setClientSecret($client_secret)
    {
        $this->client_secret = $client_secret;

        return $this;
    }

    public function insert()
    {
        $connection = mysqli_connect("localhost:3306", USERNAME, PASSWORD, "oauth_test_pc");

        $insert = 'INSERT INTO oauth_clients (client_id,client_secret,redirect_uri) 
                        VALUES ("'.$this->client_id.'","'.$this->client_secret.'","http://fake/")';

        return mysqli_query($connection, $insert);
    }
}
