<?php

namespace App\Http\Controllers;

use App\Models\User;
use function foo\func;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Carbon;

class UsersController extends Controller
{
    public function __construct()
    {
        //ログインしていないユーザー（ゲストユーザー）は新規登録とプロフィール閲覧は可能
        $this->middleware('auth',[
            'except'=>['show','create','store','index','confirmEmail']
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
        $statuses = $user ->statuses()
                            ->orderBy('created_at','desc')
                            ->paginate(10);
        return view('users.show', compact('user','statuses'));
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

        $this->sendEmailConfirmation($user);
        session()->flash('success', '認証メールを発送しました！ご登録のメールアドレスにで会員登録を完了させてください');
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

    //delete
    public function destroy(User $user)
    {
        $this->authorize('destroy',$user);
        $user->delete();
        session()->flash('success','ユーザーを削除しました');
        return back();
    }

    //メールアドレスを認証
    public function confirmEmail($token)
    {
        $user = User::where('activation_token',$token)->firstorFail();
        $user -> activated = true;
        $user -> activation_token = null;
        $user -> email_verified_at = Carbon::now();
        $user -> save();

        Auth::login($user);
        session()->flash('success','メールを認証しました。');
        return redirect()->route('users.show',$user);
    }

    protected function sendEmailConfirmation($user)
    {
      $view = 'emails.confirm';
      $data = compact('user');
      $name = 'Summer';
      $to = $user->email;
      $subject = "[Weibo App]会員登録を完了させてください";

      Mail::send($view,$data,function ($message)use($name,$to,$subject){
          $message->to($to)->subject($subject);
      });
    }

    public function followings(User $user)
    {
        $users = $user->followings()->paginate(30);
        $title = $user->name.'フォロしている人';
        return view('users.show_follow',compact('users','title'));
    }

    public function followers(User $user)
    {
        $users = $user->followers()->paginate(30);
        $title = $user->name.'のフォローワー';
        return view('users.show_follow',compact('users','title'));
    }



}
