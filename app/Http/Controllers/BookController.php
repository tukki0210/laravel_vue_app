<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// 追加
use App\Models\Book;

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
}