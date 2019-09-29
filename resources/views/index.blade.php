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
                    <div class="col-md-5" style="float: left;">
                        <img class="img-responsive" src="{{ URL::asset('storage/'.$icon) }}"/>
                    </div>
                    <p>
                        {!! $stages !!}
                    </p>
                @guest
                    <a href="/register" class="btn btn-lg">Регистрация &#8594;</a>
                @endguest

            </div>
        </div>
    </div>

    @if(count($data)!=0)
        <div class="main-results">
            <div class="container">
                <h1>TOП-5 участников</h1>
                <table class="highlight">
                    <thead>
                    <tr>
                        <th>Место</th>
                        <th>ID/Участник</th>
                        <th>Этап I</th>
                        <th>Этап II</th>
                        <th>Этап III</th>
                        <th>Этап IV</th>
                        <th>Этап V</th>
                        <th>Этап VI</th>
                        <th>Этап VII</th>
                        <th>Общая сумма баллов</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $ket=>$results)
                        <tr>
                            <td>{{$ket+1}}</td>
                            <td>{{$results->id_user}} - {{$results->lastname}} {{$results->firstname}}</td>
                            <td>{{$results->stage_1}}</td>
                            <td>{{$results->stage_2}}</td>
                            <td>{{$results->stage_3}}</td>
                            <td>{{$results->stage_4}}</td>
                            <td>{{$results->stage_5}}</td>
                            <td>{{$results->stage_6}}</td>
                            <td>{{$results->stage_7}}</td>
                            <td>{{$results->results}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif

@endsection
