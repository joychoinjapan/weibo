<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest',[
           'only'=>['create','store']
        ]);
    }


    public function create()
    {
        return view('sessions.create');
    }

    public function store(Request $request)
    {
        $credentials=$this->validate($request,[
            'email' => 'required|email|max:255',
            'password' => 'required'
        ]);

        if(Auth::attempt($credentials,$request->has('remember'))){
            if(Auth::user()->activated){
                session()->flash('success','ログインしました');
                $fallback = route('users.show',Auth::user());
                return redirect()->intended($fallback);
            }else{
                Auth::logout();
                session()->flash('warning','ご登録のメールアドレスはまだ認証されていません。メールを確認し、登録手続きを完了させて下さい。');
                return redirect('/');
            }

        }else{
            session()->flash('danger','ログインができませんでした。ご確認の上もう一度お試しください。');
            return redirect()->back()->withInput();
        }
    }

    public function destroy()
    {
        Auth::logout();
        session()->flash('success', 'ログアウトしました！');
        return redirect('login');

    }
}
