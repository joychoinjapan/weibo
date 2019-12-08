@extends('layouts.default')
@section('title','ログイン')
@section('content')
    <div class="offset-md-2 col-md-8">
        <div class="card">
            <div class="card-header">
                <h5>ログイン</h5>
            </div>
            <div class="card-body">
                @include('shared._errors')
                <form method="post" action="{{route('login')}}">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="">メール</label>
                        <input type="email" name="email" class="form-control" value="{{old('email')}}">
                    </div>
                    <div class="form-group">
                        <label for="password">パスワード</label>
                        <input type="password" name="password" class="form-control" value="{{old('password')}}">
                    </div>
                    <button type="submit" class="btn btn-primary submit-btn">ログイン</button>
                </form>
                <hr>

                <p>初めての方は<a href="{{route('users.create')}}">今すぐ新規登録</a></p>
            </div>
        </div>
    </div>



@stop
