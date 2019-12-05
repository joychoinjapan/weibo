@extends('layouts.default')
@section('title','注册')
@section('content')
 <div class="offset-md-2 col-md-8">
     <div class="card">
         <div class="card-header">
             <h5>アカウント新規登録</h5>
         </div>
         <div class="card-body">
             <form method="post" action="{{route('users.store')}}">
                 <div class="form-group">
                     <label for="">名前</label>
                     <input type="text" name="name" class="form-control" value="{{old('name')}}">
                 </div>
                 <div class="form-group">
                     <label for="">メール</label>
                     <input type="email" name="email" class="form-control" value="{{old('email')}}">
                 </div>
                 <div class="form-group">
                     <label for="password">パスワード</label>
                     <input type="text" name="password" class="form-control" value="{{old('password')}}">
                 </div>
                 <div class="form-group">
                     <label for="password_confirmation">パスワード再入力</label>
                     <input type="text" name="password_confirmation" class="form-control" value="{{old('password_confirmation')}}">
                 </div>
                     <button type="submit" class="btn btn-primary submit-btn">新規登録</button>
             </form>
         </div>
     </div>
 </div>



    @stop
