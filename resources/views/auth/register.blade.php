@extends('template')

@section('index')

    <nav>
        <div class="container">
            <a href="/">Главная страница</a>
            <a href="/login">Вход</a>
        </div>
    </nav>
    <div class="auth-form" style="margin: 5vh 0;">
        <form method="POST" action="{{ route('register') }}" class="container">
            <h1>Регистрация</h1>
            @csrf
            <div class="form-input">
                <label for="name" class="col-md-4 col-form-label text-md-right">ФИО</label>
                <input id="name" class="form-control" type="text" name="name" value="{{ old('name') }}" required
                       autocomplete="name" autofocus>
                @error('name')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>
            <div class="form-input">
                <label for="age" class="col-md-4 col-form-label text-md-right">Возраст</label>
                <input id="age" type="text" class="form-control" name="age" value="{{old('age')}}" required>
            </div>
            <div class="form-input">
                <label for="studywork" class="col-md-4 col-form-label text-md-right">Место учебы/работы</label>
                <input id="studywork" type="text" class="form-control" name="studywork" value="{{old('studywork')}}"
                       required>
            </div>

            <div class="form-input">
                <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                       value="{{ old('email') }}" required autocomplete="email">

                @error('email')
                <span class="invalid-feedback" role="alert"><strong>Почта занята</strong></span>
                @enderror
            </div>

            <div class="form-input">
                <label for="password" class="col-md-4 col-form-label text-md-right">Пароль</label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                       name="password" required autocomplete="new-password">
                @error('password')
                <span class="invalid-feedback" role="alert"><strong>Пароль должен быть больше 8 символов</strong></span>
                @enderror
            </div>

            <div class="form-input">
                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Подтвердите пароль</label>
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required
                       autocomplete="new-password">
            </div>
            <div class="form-continue">
                <button class="btn btn-secondary btn-lg btn-block" type="submit">Регистрация</button>
            </div>
        </form>
    </div>
@endsection
