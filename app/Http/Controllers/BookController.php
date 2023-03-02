<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// 追加
use App\Models\Book;
use LDAP\Result;

use GuzzleHttp;

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
        // 参考：教科書P２５９あたり

        // モデルの空のインスタンスを生成
        $book = new Book();
        // 受け取ったリクエストのデータを全て取得
        $form = $request->all();
        // 不要な列を削除
        unset($form['_token_']);
        // 受け取ったデータをインスタンスに挿入し、DBに保存
        $book->fill($form)->save();

        // 特に返すものはないからreturn はしない
        // return '';
    }
    public function search(Request $request)
    {
        // キーワードを受け取れているか確認
        // dd($request->keyword);
        // 教科書P246参照
        $books = Book::where('title','like','%'.$request->keyword.'%')->get();

        // 検索結果をreturnする
        return $books;
    }
    // 教科書P299
    public function show($id)
    {
        $book = Book::find($id);

        return $book;
    }

    public function getRakutenAPI(Request $request)
    {
        // フロントエンドから検索したい本のタイトルを受け取る
        $title = $request->title;

        $cli = new GuzzleHttp\Client([
            'base_uri' => 'https://app.rakuten.co.jp'
        ]);

        // リクエストを送信
        $res = $cli->request(
            'get',
            '/services/api/BooksBook/Search/20170404',
            ['query' => [
                'format' => 'json',
                'applicationId' => env('RAKUTEN_APP_ID'),
                'title'=>$title
                ]
            ]
        );

        // jsonに変換してreturnする
        // PHPのときはjson_decode()で変換する

        // Laravelの場合は自動でjsonに変換してくれるので不要
        return $res->getBody();
    }
}