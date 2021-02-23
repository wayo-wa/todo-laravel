<!-- ログインページ -->

@section('title', 'ログイン')
@extends('layouts.common')

@section('content')
<div class="l-main__inner">
    <div class="p-form__block">
        <h2 class="p-form__title">ログイン</h2>
        <div class="p-form__body">
            <form method="POST" action="{{ route('login') }}" novalidate>
                @csrf
                <!-- email -->
                @error('email')
                    <p class="u-color--warning">{{ $message }}</p>
                @enderror
                <label class="u-position-re">
                    <i class="fas fa-envelope c-icon p-form__icon"></i>
                    <input class="p-form__input u-mb-10 @error('email') is-invalid @enderror" type="email" name="email" placeholder="メールアドレス">
                </label>
                @error('password')
                    <p class="u-color--warning">{{ $message }}</p>
                @enderror
                <label class="u-position-re">
                    <i class="fas fa-lock c-icon p-form__icon"></i>
                    <input class="p-form__input u-mb-10 @error('password') is-invalid @enderror" type="password" name="password" placeholder="パスワード">
                </label>

                <!-- checkbox -->
                <label>
                    <input class="u-checkbox" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>次回ログインを省略する
                </label>

                <!-- bottun -->
                <button type="submit" class="c-btn c-btn--green p-form__btn">ログイン</button>
            </form>
        </div>

        @if (Route::has('password.request'))
        <P class="u-mt-10">パスワードを忘れた方は
            <a class="u-color--warning" href="{{ route('password.request') }}">こちら</a>
        </p>
        @endif  
    </div>
</div>
@endsection


