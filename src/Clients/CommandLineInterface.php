<?php

namespace Maviance\PHPTest\Clients;

use Maviance\PHPTest\Services\Balance\Model\Balance;

class CommandLineInterface
{
    private $apiClientA;
    private $apiClientB;
    private $balance;

    public function __construct(BaseClientInterface $apiClientA, BaseClientInterface $apiClientB, Balance $balance)
    {
        $this->apiClientA = $apiClientA;
        $this->apiClientB = $apiClientB;
        $this->balance = $balance;
    }

    public function execute(): void
    {
        // User Story 1: Récupérer les soldes et les stocker dans le magasin de données
        $balanceA = $this->apiClientA->getBalance();
        $balanceB = $this->apiClientB->getBalance();

        $this->balance->getAmount('accountId456', $balanceA);
        $this->balance->getAmount('accountId556', $balanceB);

        echo "Soldes stockés dans le magasin de données." . PHP_EOL;

        // User Story 2: Afficher les soldes depuis le magasin de données
        $storedBalanceA = $this->balance->getAccountId('accountId456');
        $storedBalanceB = $this->balance->getAccountId('accountId556');

        echo "Solde actuel pour accountId456 : $storedBalanceA" . PHP_EOL;
        echo "Solde actuel pour accountId556 : $storedBalanceB" . PHP_EOL;
    }
}
