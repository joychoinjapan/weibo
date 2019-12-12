<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function __construct()
    {
        //ログインしていないユーザー（ゲストユーザー）は新規登録とプロフィール閲覧は可能
        $this->middleware('auth',[
            'except'=>['show','create','store']
        ]);

        //ログインしていないユーザー（ゲストユーザー）のみ新規登録可能
        $this->middleware('guest',[
            'only'=>['create','store']
        ]);
    }

    //全てのユーザーを列挙
    public function index()
    {
        $users = User::paginate(10);
        return view('users.index',compact('users'));
    }



    //新規登録画面
    public function create()
    {

        return view('users.create');
    }

    //プロフィール
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    //新規登録処理
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:50',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|confirmed|min:6'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),

        ]);

        Auth::login($user);
        session()->flash('success', 'ご登録、ありがとうございました！');
        return redirect()->route('users.show', $user);


    }

    //プロフィール編集画面
    public function edit(User $user)
    {
        //UserPolicyに参照
        $this->authorize('update',$user);
        return view('users.edit', compact('user'));
    }

    //更新処理
    public function update(User $user, Request $request)
    {
        //UserPolicyに参照
        $this->authorize('update',$user);
        //nullable passwordを更新しなくて可能
        $this->validate($request, [
            'name' => 'required|max:50',
            'password' => 'nullable|confirmed|min:6'
        ]);

        $data = [];

        $data['name'] = $request->name;

        if ($request->password) {

            $data['password'] = bcrypt($request->password);

        }
        $user->update($data);

        session()->flash('success', 'プロフィールを変更しました！');

        return redirect()->route('users.show', $user->id);
    }


}
