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
            <div class="login-name">
                <div class="col-md-4">
                    <div class="form-input">
                        <label for="name" class="col-form-label text-md-right">Фамилия</label>
                        <input id="name" class="form-control" type="text" name="lastname" required autofocus>
                        @error('lastname')
                        <span class="invalid-feedback" role="alert"><strong>Неправильно введена фамилия</strong></span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-input">
                        <label for="name" class="ol-form-label text-md-right">Имя</label>
                        <input id="name" class="form-control" type="text" name="firstname" required autofocus>
                        @error('firstname')
                        <span class="invalid-feedback" role="alert"><strong>Неправильно введено имя</strong></span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-input">
                        <label for="name" class="col-form-label text-md-right">Отчество</label>
                        <input id="name" class="form-control" type="text" name="patronomic" required autofocus>
                        @error('patronomic')
                        <span class="invalid-feedback" role="alert"><strong>Неправильно введено отчество</strong></span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="form-input">
                <label for="age" class="col-md-4 col-form-label text-md-right">Возраст</label>
                <input id="age" type="date" class="form-control" name="age" value="{{old('age')}}" required
                       max="2009-12-31" min="1990-01-01">
            </div>
            <div class="form-input">
                <label for="studywork" class="col-md-4 col-form-label text-md-right">Место учебы/работы</label>
                <input id="studywork" type="text" class="form-control" name="studywork" value="{{old('studywork')}}"
                       required>
                @error('studywork')
                <span class="invalid-feedback" role="alert"><strong>Неправильно введено место учебы/работы</strong></span>
                @enderror
            </div>

            <div class="form-input">
                <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                       name="email"
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
                <span class="invalid-feedback"
                      role="alert"><strong>Пароль должен быть больше 8 символов</strong></span>
                @enderror
            </div>

            <div class="form-input">
                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Подтвердите
                    пароль</label>
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                       required
                       autocomplete="new-password">
            </div>

            <div class="my-confirm">
                <label for="my">
                    <input name="my" class="checkbox-inline" type="checkbox" required/>Я соглашаюсь дать свои персональные данные в соответсвии с законом РФ N 152-ФЗ
                </label>
            </div>

            <div class="form-continue">
                <button class="btn btn-secondary btn-lg btn-block" type="submit">Регистрация</button>
            </div>
        </form>
    </div>
@endsection
