<?php

include "vendor/autoload.php";

use App\AuthClient;

$client = new AuthClient();

$identifier = $_POST['identifier'];
$password = $_POST['password'];
$result = $client->login($identifier, $password);
$body = $result->getBody()->getContents();
$information = json_decode($body);
$details = $information->user;
$username = $details->username;
$email = $details->email;

header('Location: login-valid.php?username=' . $username . '&email=' . $email);
