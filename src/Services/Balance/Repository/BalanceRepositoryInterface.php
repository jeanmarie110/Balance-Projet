<?php
namespace Maviance\PHPTest\Services\Balance\Repository;

use Maviance\PHPTest\Services\Balance\Model\BalanceInterface;

/**
 * Interface defining data store interactions for balance operations
 */
interface BalanceRepositoryInterface
{
    /**
     * create a new blance record with default values
     */
    public function create() : Balance;

    /**
         * save a balance
         */
    public function save(BalanceInterface $balance):bool;

    /**
     * Return current balance with provider
     *
     * @return float
     */
    public function getBalance():float;
}
