@extends('template')

@section('index')
    <nav style="margin-bottom: 20px;">
        <div class="container">
            <a href="/login">Вход</a>
            <a href="/register">Регистрация</a>
        </div>
    </nav>
    <div class="container">
        <div class="auth-form" style="margin: 20vh 0">
            <form method="POST" action="{{ route('password.update') }}" class="container">
                <h2>Смена пароля</h2>
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">

                <div class="form-input">
                    <label for="name" class="ol-form-label text-md-right">Email</label>
                    <input id="email" type="email"
                           class="form-control @error('email') is-invalid @enderror" name="email"
                           value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                    <span class="invalid-feedback" role="alert"><strong>Время восстановления истекло</strong></span>
                    @enderror
                </div>

                <div class="form-input">
                    <label for="password">Пароль</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                           name="password" required autocomplete="new-password">
                    @error('password')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>

                <div class="form-input">
                    <label for="password-confirm">Подтвердить пароль</label>
                    <input id="password-confirm" type="password" class="form-control"
                           name="password_confirmation" required autocomplete="new-password">
                </div>
                <div class="form-continue">
                    <button class="btn btn-secondary btn-lg btn-block" type="submit">Восстановить пароль</button>
                </div>
            </form>
        </div>
    </div>
@endsection
