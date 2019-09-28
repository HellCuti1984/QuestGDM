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
        </div>
    </div>
    <div class="quest-info">
        <div class="container">
            <h1>Патриоты поколения Z: точка сборки</h1>
            <div class="info">
                <div class="col-md-5">
                    <img class="img-responsive" src="{{ URL::asset('image/none.png') }}"/>
                </div>
                <div class="col-md-7">
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


        <div class="main-results">
            <div class="container">
                <div class="limiter">
                    <div class="container-table100">
                        <div class="wrap-table100">
                            <div class="table100">
                                <table>
                                    <thead>
                                    <tr class="table100-head">
                                        <th class="column6">Место</th>
                                        <th class="column6">Участник</th>
                                        <th class="column6">Этап I</th>
                                        <th class="column6">Этап II</th>
                                        <th class="column6">Этап III</th>
                                        <th class="column6">Этап IV</th>
                                        <th class="column6">Этап V</th>
                                        <th class="column6">Этап VI</th>
                                        <th class="column6">Общее кол-во баллов</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td class="column6"></td>
                                        <td class="column6"></td>
                                        <td class="column6">iPhone X 64Gb Grey</td>
                                        <td class="column6">$999.00</td>
                                        <td class="column6">1</td>
                                        <td class="column6">$999.00</td>
                                        <td class="column6">$999.00</td>
                                        <td class="column6">$999.00</td>
                                        <td class="column6">$999.00</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection
