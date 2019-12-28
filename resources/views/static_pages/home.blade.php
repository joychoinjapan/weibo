@extends('layouts.default')
@section('title','ホーム')
@section('content')
    @if(\Illuminate\Support\Facades\Auth::check())
        <div class="row">
            <div class="offset-md-1 col-md-8">
                <section class="status_form">
                    @include('shared._status_form')
                </section>
                <h4>投稿リスト</h4>
                <hr>
            </div>
            <div class="col-md-2">
                <section class="user_info">
                    @include('shared._user_info',['user'=>\Illuminate\Support\Facades\Auth::user() ?? ''])
                </section>
            </div>
        </div>
        <div class="row">
            <div class="offset-md-1 col-md-8">
                <section class="status_form">
                    @include('shared._feed')
                </section>
            </div>
        </div>
    @else
    <div class="jumbotron">
        <h1>Hello Laravel</h1>
        <p class="lead">今ご覧になるのは<a href="https://learnku.com/courses/laravel-essential-training">
                Laravel 入門
            </a>サンプルページ
        </p>
        <p>
            早速、始めましょう！
        </p>
        <p>
            <a class="btn btn-lg btn-success" href={{route('users.create')}} role="button">今すぐアカウント作成</a>
        </p>
    </div>
    @endif
@stop
