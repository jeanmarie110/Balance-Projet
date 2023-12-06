<?php

namespace Maviance\PHPTest\Api;

use Maviance\PHPTest\Clients\BaseClientInterface;


class AccountApiClient implements BaseClientInterface
{
    public function init(): bool
    {
        // Logique d'initialisation, si nécessaire
        return true;
    }

    public function getBalance(): float
    {
        // Logique pour interroger l'API et récupérer le solde
        // Exemple avec l'API a)
        $apiResponse = $this->makeApiCall('https://balance.free.beeceptor.com/account-balance/456');

        // Exemple: Parsing de la réponse (peut varier selon la structure de la réponse)
        $balance = isset($apiResponse['balance']) ? (float)$apiResponse['balance'] : 0.0;

        return $balance;
    }

    public function ping(): bool
    {
        // Logique pour vérifier la disponibilité de l'API
        // Exemple avec l'API a)
        $apiResponse = $this->makeApiCall('https://balance.free.beeceptor.com/account-balance/456');

        return isset($apiResponse['status']) && $apiResponse['status'] === 'success';
    }

    // Méthode générique pour effectuer des appels API
    private function makeApiCall(string $url): array
    {
        // Logique pour effectuer un appel API (utiliser des bibliothèques comme Guzzle, cURL, etc.)
        // Retourne une structure de tableau simulée pour cet exemple
        return [
            'status' => 'success',
            'balance' => 100.0,
        ];
    }
}
