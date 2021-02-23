<!-- パスワードリセットメール送信ページ -->

@section('title', 'Reset Password')
@extends('layouts.common')

@section('content')
    <div class="p-main__inner">
        <div class="p-form__block">
            <h2 class="p-form__title">パスワードリセット</h2>
            <div class="c-form__block">
                <form method="POST" action="{{ route('password.email') }}" novalidate>
                    @csrf

                    <!-- email -->
                    @error('email')
                        <p class="u-color--warning">{{ $message }}</p>
                    @enderror
                    <label class="u-position-re">
                        <i class="fas fa-envelope c-icon p-form__icon"></i>
                        <input class="p-form__input u-mb-10 @error('email') is-invalid @enderror" type="email" name="email" placeholder="メールアドレス"　value="{{ old('email') }}">
                    </label>
                    
                    <input class="c-btn c-btn--green p-form__btn" type="submit" value="パスワードリセットメールを送る" >
                </form>
            </div>
            
        </div>
    </div>
@endsection

