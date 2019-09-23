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
            <table>
                @if(count($stages)!=0)
                    @foreach($stages as $stage)
                        <tr>
                            <th>Этап</th>
                            <th>Название</th>
                            <th>Редактирование</th>
                        </tr>
                        <tr>
                            <td>{{$stage->id}}</td>
                            <td>{{$stage->title}}</td>
                            <td>
                                <div class="btn btn-secondary btn-lg btn-block">Редактировать</div>
                            </td>
                        </tr>
                    @endforeach
                    @else
                    Саси))
                @endif
            </table>
            <div class="col-md-3">
                <a href="">
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
