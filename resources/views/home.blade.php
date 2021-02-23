<!-- トップページ -->

@section('title', 'トップページ')
@extends('layouts.common')

@section('content')
    <div class="p-hero__bigbg">
        <div class="p-hero__block">
            <h2 class="p-hero__title u-mb-20">Let's start making your<br class="u-br--sp"> to do list!</h2>
            <p class="p-hero__subtitle u-mb-60">さっそくリスト管理を始めよう！</p>
            <div class="p-hero__btn-wrap">
                @if(Auth::check())
                    <a class="c-btn p-hero__btn-rink" href="{{ route('todo.index') }}">TODOリスト管理画面へ</a>
                @else
                    <a class="c-btn p-hero__btn-rink" href="{{ route('register') }}">アカウントを作成する</a>
                @endif
            </div>
        </div>
    </div>
@endsection

