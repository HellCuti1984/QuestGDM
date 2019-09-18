@extends('template')

@section('index')

    <nav>
        <div class="container">
            <a href="/">Главная страница</a>
            <a href="/register">Регистрация</a>
        </div>
    </nav>

    <div class="auth-form" style="margin: 15vh 0;">
        <form method="POST" action="{{ route('login') }}" class="container">
            <h1>Вход</h1>
            @csrf
            <div class="form-input">
                <label for="email">E-mail</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                       value="{{ old('email') }}" required autocomplete="email" autofocus>

                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>Неправльный пароль или почта</strong>
                </span>
                @enderror
            </div>

            <div class="form-input">
                <label for="password">Пароль:</label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                       name="password" required autocomplete="current-password">
                @error('password')
                <span class="invalid-feedback" role="alert"><strong>Пароль должен быть больше 8 символов</strong></span>
                @enderror
            </div>
            <div class="form-continue">
            <!--<input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                <label for="remember">Запомнить меня</label>-->
                <button class="btn btn-secondary btn-lg btn-block" type="submit">Вход</button>
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}">Забыли пароль?</a>
                @endif
            </div>
        </form>
    </div>
@endsection
