<?php

namespace App;

class Calculate
{
    // PHPはJavaと同じように、引数・戻り値の型が書ける(書かなくてもよい)
    // 引数 $amount: 合計金額
    public function CalculatePoint(int $amount): int
    {
        if ($amount < 1000){
            return 0;
        }

        if ($amount < 10000){
            $basePoint = 1;
        } else {
            $basePoint = 2;
        }

        return intval($amount/100) * $basePoint;
    }
}