<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        // emailとpasswordがあるか確認
        $credential = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if(Auth::attempt($credential)){
            // ログインが成功した場合

            // sessionIDを(再)生成する
            $request->session()->regenerate();

            return response()->json([
                'message'=>'ログインしました'
            ]);
        }

        // ログインが失敗した場合
        return response()->json([
            'message' => 'メールアドレスまたはパスワードが間違っています'
        ],401);
    }
}
