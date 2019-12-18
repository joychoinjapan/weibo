@extends('layouts.default')
@section('title','パスワードリセット')
@section('content')
    <div class="offset-md-2 col-md-8">
        <div class="card">
            <div class="card-header">
                <h5>パスワードをリセット</h5>
            </div>
            <div class="card-body">
                @if(session('status'))
                    <div class="alert alert-success">
                        {{session('status')}}
                    </div>
                    @endif
                <form method="POST" action="{{route('password.email')}}">
                    {{csrf_field()}}
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email" class="form-control-label">メールアドレス:</label>
                        <input id="email" type="email" class="form-control mb-md-3" name="email" value="{{old('email')}}" required>
                        @if($errors->has('email'))
                            <div class="alert alert-danger">
                               {{$errors->first('email')}}
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">パスワードリセットメールを発送</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endsection
