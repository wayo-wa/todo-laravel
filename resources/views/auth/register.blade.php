<!-- 新規登録ページ -->

@section('title', '新規登録')
@extends('layouts.common')

@section('content')
    <div class="l-main__inner">
        <div class="p-form__block">
            <h2 class="p-form__title">新規登録</h2>
            <div class="p-form__body">              
                <form method="POST" action="{{ route('register') }}" novalidate>
                    @csrf

                    <!-- name -->
                    @error('name')
                        <p class="u-color--warning">{{ $message }}</p>
                    @enderror
                    <label class="u-position-re">
                        <i class="fas fa-user-alt c-icon p-form__icon"></i>
                        <input class="p-form__input u-mb-10 @error('name') is-invalid @enderror" type="text" name="name" placeholder="ニックネーム" value="{{ old('name') }}">
                    </label>
                
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

                    
                    <!-- bottun -->
                    <button type="submit" class="c-btn c-btn--red p-form__btn">登録する</button>
                </form>
            </div>  
        </div>
    </div>
@endsection

