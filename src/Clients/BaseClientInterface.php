<?php

namespace Maviance\PHPTest\Clients;

/**
 * base interface for with the absolut minimum default functions
 */
interface BaseClientInterface
{
    /**
     * connector setup tasks to be execute before the executing of any call
     */
    public function init(): bool;

    /**
     * Get remaining balance
     * @return float
     */
    public function getBalance(): float;

    /**
     * Ping api to check availability
     * @return bool true if api is available
     */
    public function ping(): bool;
}
