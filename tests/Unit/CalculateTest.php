<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Calculate;

class CalculateTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_CalculatePoint()
    {
        $calc = new Calculate;

        $this->assertEquals(0,$calc->CalculatePoint(0));

        $this->assertEquals(0,$calc->CalculatePoint(999));
        $this->assertEquals(10,$calc->CalculatePoint(1000));
        $this->assertEquals(10,$calc->CalculatePoint(1001));

        $this->assertEquals(99,$calc->CalculatePoint(9999));
        $this->assertEquals(200,$calc->CalculatePoint(10000));
        $this->assertEquals(200,$calc->CalculatePoint(10001));
    }
}
