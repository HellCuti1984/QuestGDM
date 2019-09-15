@extends('template')

@section('index')
    <div class="main-interface">
        <div class="container">
            <nav class="login">
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/home') }}">Личный кабинет</a>
                        <a href="{{ url('/logout') }}">Выход</a>
                    @else
                        <a href="{{ route('login') }}">Вход</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Регистрация</a>
                    @endif
                @endauth
            @endif
            </nav>
            <div class="quest-info">
                <h1>Патриоты поколения Z: точка сборки</h1>
                <div class="info">
                    <div class="col-md-4">
                        <img src="{{ URL::asset('image/none.png') }}"/>
                    </div>
                    <div class="col-md-8">
                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.
                            Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur
                            ridiculus
                            mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat
                            massa
                            quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div></div>
@endsection
