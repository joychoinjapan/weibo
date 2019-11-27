<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StaticPagesController extends Controller
{
    //トップページ
    public function home()
    {

        return view('static_pages/home');
    }

    //ヘルプ
    public function help()
    {

        return view('static_pages/help');
    }



    //概要
    public function about()
    {

        return view('static_pages/about');
    }
}
