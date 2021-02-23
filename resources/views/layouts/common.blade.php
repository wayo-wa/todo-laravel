<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- vue.js ajax 通信を行う際は CSRF 対策のため -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>TO DO LIST - @yield('title', 'トップページ')</title>
    <!-- ファビコン -->
    <link rel="icon" href="{{ asset('/img/icon_4b_192.png') }}">
    <!-- google font(hero-title) -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@500&display=swap" rel="stylesheet">
    <!-- google font(body全体) -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@300&display=swap" rel="stylesheet">
    <!-- fontawesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" integrity="sha384-vSIIfh2YWi9wW0r9iZe7RJPrKwp6bG+s9QZMoITbCckVJqGCCRhc+ccxNcdpHuYu" crossorigin="anonymous">
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
    <header class="l-header">
        <div class="p-header">
            <h1 class="p-header__logo"><a href="{{ route('home') }}">TO DO LIST</a></h1> 
            <div class="p-header__nav">
                @if(Auth::check())
                    <span>{{ Auth::user()->name }}</span>さん
                    ｜
                    <a class="nav-menu__list" href="{{ route('logout') }}" id="logout" >ログアウト</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                    </form>
                @else
                    <a href="{{ route('login') }}">ログイン</a>
                    ｜
                    <a href="{{ route('register') }}">新規登録</a>
                @endif 
            </div>

            <!-- SP用ハンバーガーメニュー -->
            <div class="p-trigger">
                <div id="app1">
                    <trigger-component></trigger-component>
                </div>
            </div>
        </div>
    </header>

    <main class="l-main">
       @yield('content')
    </main>

    
    <!-- jsファイル読み込み -->
    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
    
    

    

</body>
</html>
