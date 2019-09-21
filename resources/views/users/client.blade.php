@extends('template')
@section('index')
    <div class="profile">
        <div class="container">
            <nav>
                <a href="/">Главная страница</a>
                <a href="logout">Выход</a>
            </nav>

            @if(count($data)!=0)
                <div class="my-profile">
                    <div class="row">
                        <h1>Мой профиль</h1>
                        <div class="col-md-5">
                            <img class="img-responsive"
                                 src="@if(Auth::user()->avatar == null){{ URL::asset('image/none.png') }}@else{{ asset('storage/'.Auth::user()->avatar) }}@endif"/>
                            <h2>Сменить аватар</h2>
                            <form action="{{route('image_upload')}}" method="POST" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <input type="file" name="image" required>
                                <button class="btn btn-secondary btn-lg btn-block" type="submit">Загрузить</button>
                                @error('image')
                                <div class="alert alert-danger">
                                    Аватар должен:
                                    <ul>
                                        <li>Иметь формат: jpeg, png, bmp, gif, svg.</li>
                                        <li>Весить не больше 5Мб.</li>
                                    </ul>
                                </div>
                                @enderror
                            </form>
                        </div>
                        <div class="col-md-7">
                            <div class="user-info">
                                <div class="info-element">
                                    <span>Ваш ID</span>
                                    <div>{{ Auth::user()->id }}</div>
                                </div>
                                <div class="info-element">
                                    <span>ФИО</span>
                                    <div>{{ Auth::user()->name }}</div>
                                </div>
                                <div class="info-element">
                                    <span>Возраст</span>
                                    <div>{{ Auth::user()->age }}</div>
                                </div>
                                <div class="info-element">
                                    <span>Место учебы/работы</span>
                                    <div>{{ Auth::user()->studywork }}</div>
                                </div>
                                <div class="info-element">
                                    <span>E-mail</span>
                                    <div>{{ Auth::user()->email }}</div>
                                </div>
                            </div>
                            <div class="my-position">
                                @foreach($data as $info)
                                    <div class="position-info col-md-4">
                                        <div>{{$id_stage}}</div>
                                        <div>Место</div>
                                    </div>
                                    <div class="position-info col-md-4">
                                        <div>{{$info->user_points}}</div>
                                        <div>Баллы за этап</div>
                                    </div>
                                    <div class="position-info col-md-4">
                                        <div>{{$all_points}}</div>
                                        <div>Общие баллы</div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>

    <div class="profile-quest">
        <div class="container">
            <h1>Этап {{$id_stage}}</h1>
            <h4>Времени осталось:</h4>
            <div class="row">
                <div class="col-md-7">
                    <div id="clockdiv">
                        <div>
                            <span class="days"></span>
                            <div class="smalltext">Дни</div>
                        </div>
                        <div>
                            <span class="hours"></span>
                            <div class="smalltext">Часы</div>
                        </div>
                        <div>
                            <span class="minutes"></span>
                            <div class="smalltext">Минуты</div>
                        </div>
                        <div>
                            <span class="seconds"></span>
                            <div class="smalltext">Секунды</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">

                <div class="stage-info">
                    <div class="stage-description">
                        {{$info->description}}
                    </div>
                </div>
            </div>
            <div class="row">
                <form class="col-md-4" method="POST" action="{{route('file_upload')}}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="file" name="file_quest" required>
                    <button class="btn btn-secondary btn-lg btn-block" type="submit">Загрузить свой ответ</button>
                    @error('file_quest')
                    <div class="alert alert-success">
                        Поддерживаемые расширения: .doc, .dot, .pdf.
                    </div>
                    @enderror
                </form>

                <form class="col-md-4" method="POST" action="" enctype="multipart/form-data">
                    <button class="btn btn-secondary btn-lg btn-block" type="submit">Скачать Квест-файл</button>
                </form>
            </div>
        </div>
    </div>
@endsection
