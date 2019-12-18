@extends('layouts.default')
@section('title','パスワードリセット')
@section('content')
    <div class="offset-md-2 col-md-8">
        <div class="card">
            <div class="card-header">
                <h5>新しいパスワードをご入力ください</h5>
            </div>
            <div class="card-body">
                <form method="POST" action="{{route('password.update')}}">
                    @csrf
                    <input type="hidden" name="token" value="{{$token}}">
                    <div class="form-group row">
                        <label for="email" class="col-md-5 col-form-label">メールアドレス:</label>
                        <div class="">
                            <input id="email" type="email" name="email" value="{{old('email')}}" required autofocus>
                            @if($errors->has('email'))
                                <div class="alert alert-danger">
                                    {{$errors->first('email')}}
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="password" class="col-md-5 col-form-label">パスワード:</label>
                        <div class="">
                        <input id="password" type="password" class="" name="password" value="" required>
                        @if($errors->has('password'))
                            <div class="alert alert-danger">
                                {{$errors->first('password')}}
                            </div>
                        @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="password_confirmation" class="col-md-5 col-form-label">パスワード（確認）:</label>
                        <div class="">
                        <input id="password_confirmation" type="password" class="" name="password_confirmation" value="" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">パスワードをリセット</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
