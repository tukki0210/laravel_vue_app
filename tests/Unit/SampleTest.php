<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Sample;

class SampleTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example()
    {
        // $this は このSampleTest自体のこと

        // trueであるか
        $this->assertTrue(true);
        // falseであるか
        $this->assertFalse(false);

        // 配列が空であるか
        $arr = [];
        $this->assertEmpty($arr);

        // 指定した文字と一致するか
        $msg = 'Hello';
        $this->assertEquals('Hello',$msg);

        // 指定した値以下であるか
        $n = random_int(0,100);
        $this->assertLessThan(100,$n);

    }

    public function test_add()
    {
        // テスト対象を呼び出し、インスタンスを作る
        $sample = new Sample;
        // このインスタンスが持つメソッドを実行
        $sum = $sample->add(5,3);
        // addメソッドの結果が期待した通りであるかを判定
        $this->assertEquals(8,$sum);

        $sum2 = $sample->add(-100,-20);
        $this->assertEquals(-120,$sum2);
        
        $sum3 = $sample->add(0,0);
        $this->assertEquals(0,$sum3);
        
    }

    /**
     * @test
     */
    public function 引き算()
    {
        $sample = new Sample;
        $sum = $sample->sub(5,3);
        $this->assertEquals(2,$sum);

        $sum2 = $sample->sub(-100,-20);
        $this->assertEquals(-80,$sum2);
    }
}
