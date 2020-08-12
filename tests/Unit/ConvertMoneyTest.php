<?php

namespace Tests\Unit;

use App\Models\PrizeMoney;
use PHPUnit\Framework\TestCase;

class ConvertMoneyTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertEquals(100, PrizeMoney::convertToBonus(10));
    }
}
