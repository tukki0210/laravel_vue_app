<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// 追加
use App\Models\Book;
use LDAP\Result;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::all();
        // eloquantをそのままreturnすると、jsonに変換してくれる。
        return $books;
    }

    public function store(Request $request)
    {
        // dd()を使うと、そこで処理が止まる
        // dd($request);

        // 参考：教科書P２５９あたり

        // モデルの空のインスタンスを生成
        $book = new Book();

        // 受け取ったリクエストのデータを全て取得
        $form = $request->all();

        // 不要な列を削除
        unset($form['_token_']);

        // 受け取ったデータをインスタンスに挿入し、DBに保存
        $book->fill($form)->save();
    }
    public function search(Request $request)
    {
        // キーワードを受け取れているか確認
        // dd($request);
        // 教科書P246参照
        $item = Book::where('title',$request->keyword)->first();

        return $item;
    }
}