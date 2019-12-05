<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    //新規登録画面
    public function create()
    {

        return view('users.create');
    }

    //プロフィール
    public function show(User $user)
    {
        return view('users.show',compact('user'));
    }


}
