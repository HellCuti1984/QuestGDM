@extends('template')
@section('index')
    <nav>
        <div class="container">
            <a style="float: left;">{{ Auth::user()->name }}</a>
            <a href="/">Главная страница</a>
            <a href="/home">Кабинет</a>
        </div>
    </nav>

    <div class="stage-users">
        <div class="container">
            <table class="simple-little-table">
                @if(count($users)!=0)
                    <tr>
                        <th>ID</th>
                        <th>Пользователь</th>
                        <th>Выставить баллы</th>
                    </tr>
                    @foreach($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{ $user->lastname }} {{ $user->firstname }} {{ $user->patronomic }}</td>
                            <td>
                                <a href="/home/user_points/{{$user->id}}" class="btn btn-secondary btn-lg btn-block" style="margin: 0px;" type="submit">Выставить баллы</a>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <h1 style="color: #fff;">Все баллы за этап выставленны!</h1>
                @endif
            </table>
        </div>
    </div>
@endsection
