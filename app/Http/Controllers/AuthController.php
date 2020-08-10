<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\UserStorageRequest;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request) {
        $credentials = $request->only('email', 'password');
        if(Auth::attempt($credentials)) {
            $user = Auth::user();
            return $user->createToken("auth token")->accessToken;
        }
        return response()->json(['message' => '用户名或密码吗错误'], 400);
    }

    //注册
    public function store(UserStorageRequest $request) {
        $datas = $request->input();
        $user = User::create($datas);
        
        return $user->createToken("auth token")->accessToken;
    }
}
