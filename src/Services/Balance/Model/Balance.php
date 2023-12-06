<?php

namespace Maviance\PHPTest\Services\Balance\Model;

use Maviance\PHPTest\Services\Balance\Model\BalanceInterface;


class Balance implements BalanceInterface
{
    protected $id; //db id
    protected $accountId; //account id
    protected $amount; // amount
    protected $sent_at; // when was this request sent
    protected $is_successful; // whether or not request to get the account balance was successful
    protected $error; // any error encountered during request

    /**
     * @inheritDoc
     */
    public function getId():int
    {
        return $this->id ?? 0;
    }

    /**
     * @inheritDoc
     */
    public function getAmount():float
    {
        return $this->amount;
    }

    /**
     * @inheritDoc
     */
    public function setSentAt(\DateTime $time)
    {
        $this->sent_at = $time->format('Y-m-d H:i:s');
    }

    /**
     * @inheritDoc
     */
    public function getSentAt():\DateTime
    {
        return \DateTime::createFromFormat('Y-m-d H:i:s', $this->sent_at);
    }

    /**
     * @inheritDoc
     */
    public function isSuccessful():bool
    {
        return ($this->is_successful == 1);
    }

    /**
     * @inheritDoc
     */
    public function setAmount(float $amount)
    {
        // Negative amounts aren't allowed
        if ($amount < 0) {
            throw new \InvalidArgumentException(
                "Amount can't be negative"
            );
        }

        $this->amount = $amount;
    }

    /**
     * @inheritDoc
     */
    public function setError(string $error)
    {
        $this->error = $error;
    }

    /**
     * @inheritDoc
     */
    public function getError() : string
    {
        if (\is_null($this->error)) {
            return "";
        }
        return $this->error;
    }

    /**
     * @inheritDoc
     */
    public function setSuccessful(bool $success)
    {
        $this->is_successful = $success;
    }

    /**
     * @inheritDoc
     */
    public function setBalance(float $amount)
    {
        $this->setAmount($amount);
        $this->setSuccessful(true);
    }

    /**
     * @inheritDoc
     */
    public function setAccountId(string $accountId)
    {
        $this->accountId = $accountId;
    }

    /**
     * @inheritDoc
     */
    public function getAccountId(): string
    {
        return $this->accountId;
    }
}
