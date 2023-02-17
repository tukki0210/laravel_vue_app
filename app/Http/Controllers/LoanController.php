<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// 追加
use App\Models\Loan;

class LoanController extends Controller
{
    // 現在の貸出状況を表示
    public function index()
    {
        $loans = Loan::all();
        // eloquantをそのままreturnすると、jsonに変換してくれる。
        return $loans;
    }

    // 新しい貸出状況を追加
    public function store(Request $request)
    {
        // モデルの空のインスタンスを生成
        $loan = new Loan();
        // 受け取ったリクエストのデータを全て取得
        $form = $request->all();

        // 受け取ったデータをインスタンスに挿入し、DBに保存
        $loan->fill($form)->save();

        // 特にreturnはしない場合
        return '';
    }
}
