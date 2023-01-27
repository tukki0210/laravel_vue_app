<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// 追加
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        // eloquantをそのままreturnすると、jsonに変換してくれる。
        return $users;
    }
}
