@extends('template')

@section('index')

    <nav>
        <div class="container">
            <a href="/login">Вход</a>
            <a href="/register">Регистрация</a>
        </div>
    </nav>
    <div class="container">

        <div class="auth-form" style="margin: 20vh 0">
            <form method="POST" action="{{ route('password.email') }}" class="container">
                <h2>Восстановление пароля</h2>
                @csrf
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        Мы отправили письмо вам на почту!
                    </div>
                @endif
                <div class="form-input">
                    <label for="email" class="col-md-4 col-form-label text-md-right">Ваш Email</label>

                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                           name="email"
                           value="{{ old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                                        <strong>Мы не можем найти пользователя с такой почтой</strong>
                                    </span>
                    @enderror
                </div>

                <div class="form-continue">
                    <button class="btn btn-secondary btn-lg btn-block" type="submit">Отправить письмо</button>
                </div>
            </form>
        </div>
    </div>
@endsection
