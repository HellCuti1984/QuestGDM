@extends('template')

@section('index')
    <nav>
        <div class="container">
            <a style="float: left;">{{ Auth::user()->name }}</a>
            <a href="/">Главная страница</a>
            <a href="logout">Выход</a>
        </div>
    </nav>

    <div class="admin-profile-quest">
        <h1>Список квестов</h1>
        <div class="container">
            <table class="simple-little-table">
                @if(count($stages)!=0)
                    <tr>
                        <th>Этап</th>
                        <th>Название</th>
                        <th>Редактирование</th>
                    </tr>
                    @foreach($stages as $stage)
                        <tr>
                            <td>{{$stage->id}}</td>
                            <td>{{$stage->title}}</td>
                            <td>
                                <a href="/home/quest_edit/{{$stage->id}}" class="btn btn-secondary btn-lg btn-block">Редактировать</a>
                            </td>
                        </tr>
                    @endforeach
                    @else
                @endif
            </table>
            <h1>Управление</h1>
            <div class="col-md-3">
                <a href="{{route('make_quest')}}">
                    <div class="control-element">
                        <img src="{{ URL::asset('image/quest.png') }}"/>
                        <span>Создать квест</span>
                    </div>
                </a>
            </div>
            <div class="col-md-3">
                <a href="">
                    <div class="control-element">
                        <img src="{{ URL::asset('image/point.png') }}"/>
                        <span>Выставление баллов</span>
                    </div>
                </a>
            </div>
            <div class="col-md-3">
                <a href="">
                    <div class="control-element">
                        <img src="{{ URL::asset('image/employee.png') }}"/>
                        <span>Пользователи</span>
                    </div>
                </a>
            </div>
        </div>
    </div>
@endsection
