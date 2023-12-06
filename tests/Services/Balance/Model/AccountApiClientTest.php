<?php

use PHPUnit\Framework\TestCase;
use Maviance\PHPTest\Api\AccountApiClient;


class AccountApiClientTest extends TestCase
{
    public function testGetBalance()
    {
        // Créez une instance de AccountApiClient (adaptez selon vos classes réelles)
        $apiClient = new AccountApiClient();

        // Mock l'appel API pour retourner un solde spécifique (adaptez selon votre cas)
        $apiClient->setApiCallMock(['balance' => 150.0]);

        // Appelez la méthode getBalance
        $balance = $apiClient->getBalance();

        // Vérifiez que le solde retourné est correct
        $this->assertEquals(150.0, $balance);
    }

    public function testPing()
    {
        // Créez une instance de AccountApiClient (adaptez selon vos classes réelles)
        $apiClient = new AccountApiClient();

        // Mock l'appel API pour retourner une réponse (adaptez selon votre cas)
        $apiClient->setApiCallMock(['status' => 'success']);

        // Appelez la méthode ping
        $apiAvailable = $apiClient->ping();

        // Vérifiez que l'API est disponible
        $this->assertTrue($apiAvailable);
    }
}
