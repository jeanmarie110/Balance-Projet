<?php

namespace Maviance\PHPTest\Services\Balance\Model;


/**
 * Each Balance record represents an ATTEMPT to retrieve the balance
 */
interface BalanceInterface
{

    /**
     * Database Integer
     *
     * @return integer
     */
    public function getId(): int;

    /**
     * amount of balance
     * @return float
     */
    public function getAmount() : float;

    /**
     * set amount of balance
     *
     * @param float $amount
     *
     */
    public function setAmount(float $amount);

    /**
     * store the error
     *
     * @param string $error
     *
     */
    public function setError(string $error);

    /**
     * return the error
     */
    public function getError() : string;

    /**
     * when was this request sent
     */
    public function getSentAt() : \DateTime;

    /**
     * when was this request sent
     * @param  \DateTime $time
     */
    public function setSentAt(\DateTime $time);

    /**
     * whether or not request was successful
     */
    public function isSuccessful() : bool;

    /**
     * whether or not request was successful
     * @param bool $success true on success
     */
    public function setSuccessful(bool $success);

    /**
     * set amount of balance and set the successful to true
     */
    public function setBalance(float $amount);

    /**
     * set account id
     * @param string $accountId account id
     */
    public function setAccountId(string $accountId);

    /**
     * retierve account id
     */
    public function getAccountId(): string;
}
