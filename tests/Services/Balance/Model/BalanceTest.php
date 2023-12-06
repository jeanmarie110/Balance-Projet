<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;
use Maviance\PHPTest\Services\Balance\Model\Balance;

class BalanceTest extends TestCase
{
    /**
     * test that negative amounts are rejected
     * @return void
     */
    public function testAmountNegative()
    {
        $this->expectException(InvalidArgumentException::class);
        $b = new Balance();
        $b->setAmount(-1);
    }

    /**
     * test that positive amounts are accepted
     * @return void
     */
    public function testAmountPositive():void
    {
        $b = new Balance();
        $b->setAmount(1);
        $this->assertEquals(1, $b->getAmount());
    }
}
