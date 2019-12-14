@extends('layouts.default')
@section('title','プロフィール更新')
@section('content')
    <div class="row">
        <div class="offset-md-2 col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5>プロフィールを更新</h5>
                </div>
                <div class="card-body">
                    @include('shared._errors')
                    <div class="gravatar_edit">
                        <a href="http://gravatar.com/emails"  target="_blank">
                            <img class="gravatar" src="{{$user->gravatar('200')}}" alt="{{$user->name}}" class="gravatar">
                        </a>
                    </div>
                    <form method="post" action="{{route('users.update',$user->id)}}">
                        {{method_field('PATCH')}}
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="">名前</label>
                            <input type="text" name="name" class="form-control" value="{{$user->name}}">
                        </div>
                        <div class="form-group">
                            <label for="">メール</label>
                            <input type="email" name="email" class="form-control" value="{{$user->email}}" disabled>
                        </div>
                        <div class="form-group">
                            <label for="password">パスワード</label>
                            <input type="password" name="password" class="form-control" value="{{old('password')}}">
                        </div>
                        <div class="form-group">
                            <label for="password_confirmation">パスワード再入力</label>
                            <input type="password" name="password_confirmation" class="form-control" value="{{old('password_confirmation')}}">
                        </div>
                        <button type="submit" class="btn btn-primary submit-btn">変更</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
