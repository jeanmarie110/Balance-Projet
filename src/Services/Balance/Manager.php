<?php

namespace Maviance\PHPTest\Services\Balance;

use Maviance\PHPTest\Services\Balance\Exceptions\BalanceUpdateException;
use Maviance\PHPTest\Services\Balance\Model\Balance;
use Maviance\PHPTest\Services\Balance\Repository\BalanceRepositoryInterface;
use Maviance\PHPTest\Clients\BaseClientInterface;
use Monolog\Logger;
use UnexpectedValueException;

class Manager
{

    /**
     *
     * @var BaseClientInterface
     */
    protected $client;

    /**
     *
     * @var BalanceRepositoryInterface
     */
    protected $erm;

    /**
     * @var Monolog/Logger
     */
    protected $logger;

    /**
     *
     * @param BalanceRepository $erm
     * @param BaseClientInterface $client
     */
    public function __construct(BalanceRepositoryInterface $erm, BaseClientInterface $client)
    {
        $this->client = $client;
        $this->erm = $erm;
        $this->logger = new Monolog / Logger();
    }

    public function refresh(string $accountId): Balance
    {
        $balance = $this->erm->create();

        try {
            $balance_amount = $this->client->getBalance($accountId);
            $balance->setAmount($balance_amount);
            $balance->setSuccessful(true);
            $this->logger->info("Success");
        } catch (\Throwable $e) {
            $balance->setSuccessful(false);
            $balance->setError(\sprintf("Class: %s - Message: %s", get_class($e), $e->getMessage()));
            $this->logger->error(\sprintf("Class: %s - Message: %s", get_class($e), $e->getMessage()));
            throw new UnexpectedValueException(sprintf("Could not retrieve updated balance from provider: %s", $e->getMessage()));
        } finally {
            $this->erm->save($balance);
        }
        return $balance;
    }

    public function getBalance(string $accountId): float
    {
        return $this->erm->getBalance($accountId);
    }
}
