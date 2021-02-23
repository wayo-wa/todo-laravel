<!-- パスワード変更再設定ページ -->

@section('title', 'Reset Password')
@extends('layouts.common')

@section('content')
    <div class="p-main__inner">
        <div class="p-form__block">
            <h2 class="p-form__title">パスワードリセット</h2>
            <div class="c-form__block">
                <form method="POST" action="{{ route('password.update') }}" novalidate>
                    @csrf

                    <input type="hidden" name="token" value="{{ $token }}">
                
                    <!-- email -->
                    @error('email')
                        <p class="u-color--warning">{{ $message }}</p>
                    @enderror
                    <label class="u-position-re">
                        <i class="fas fa-envelope c-icon p-form__icon"></i>
                        <input class="p-form__input u-mb-10 @error('email') is-invalid @enderror" type="email" name="email" placeholder="メールアドレス" value="{{ old('email') }}">
                    </label>
                    
                    <!-- password -->
                    @error('password')
                        <p class="u-color--warning">{{ $message }}</p>
                    @enderror
                    <label class="u-position-re">
                        <i class="fas fa-lock c-icon p-form__icon"></i>
                        <input class="p-form__input u-mb-10 @error('password') is-invalid @enderror" type="password" name="password" placeholder="パスワード">
                    </label>
                    <label class="u-position-re">
                        <i class="fas fa-lock c-icon p-form__icon"></i>
                        <input class="p-form__input u-mb-10 @error('password') is-invalid @enderror" type="password" name="password_confirmation" placeholder="パスワード（再入力）">
                    </label>

                    <input class="c-btn c-btn--green p-form__btn" type="submit" value="パスワードリセット" >
                </form>
            </div>
            
        </div>
    </div>
@endsection

