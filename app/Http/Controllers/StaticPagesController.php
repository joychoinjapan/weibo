<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StaticPagesController extends Controller
{
    //トップページ
    public function home()
    {
        $feed_items= [];
        if(Auth::check()){
            $feed_items= Auth::user()->feed()->paginate(10);
        }
        return view('static_pages/home',compact('feed_items'));
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
