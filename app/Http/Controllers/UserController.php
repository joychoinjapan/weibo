<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //新規登録
    public function create()
    {
        return view('users.create');
    }
}
