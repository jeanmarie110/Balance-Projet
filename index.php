<?php

use Maviance\PHPTest\Api\AccountApiClient;
use Maviance\PHPTest\Clients\CommandLineInterface;
use Maviance\PHPTest\Services\Balance\Model\Balance;

require 'vendor/autoload.php'; 

// Créez des instances des classes nécessaires
$apiClientA = new AccountApiClient(); // Adaptez selon vos classes réelles
$apiClientB = new AccountApiClient(); // Adaptez selon vos classes réelles
$balance = new Balance(); // Adaptez selon vos classes réelles


$cli = new CommandLineInterface($apiClientA, $apiClientB, $balance);
$cli->execute();
