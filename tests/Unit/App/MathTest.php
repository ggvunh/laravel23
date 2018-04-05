<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Math;

class MathTest extends TestCase
{
    public function testSumNumber()
    {
        $math = new Math();
        // chuan bi data
        $a = 1;
        $b = 3;
        // thuc thi function
        $result = $math->sum($a, $b);
        // so sanh
        $this->assertEquals(4, $result);
    }

    public function testSubNumber()
    {
        $a = 6;
        $b = 2;
        $math = new Math();
        $result = $math->sub($a, $b);

        $this->assertEquals(4, $result);
    }
}
