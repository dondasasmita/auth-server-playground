<?php
require 'Client.php';


if (isset($_GET["client_id"])) {
    $client = new Client($_GET["client_id"]);
    $client->generateSecret();

    $credentials = ["client_id" => $client->getClientId(),
                    "client_secret" => $client->getClientSecret()];

    $client->insert();

    echo json_encode($credentials);
}
