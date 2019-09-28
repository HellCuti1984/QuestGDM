@extends('template')
@section('index')

    @foreach($users as $user)
        <div class="profile">
            <div class="container">
                <nav>
                    <a href="/">Главная страница</a>
                    <a href="/home/user_points/">Назад</a>
                </nav>
                <div class="my-profile">
                    <div class="row">
                        <h1>Профиль участника</h1>
                        <div class="col-md-5">
                            <img class="img-responsive"
                                 src="@if(Auth::user()->avatar == null){{ URL::asset('image/none.png') }}@else{{ asset('storage/'.Auth::user()->avatar) }}@endif"/>
                        </div>
                        <div class="col-md-7">
                            <div class="user-info">
                                <div class="info-element">
                                    <span>ID</span>
                                    <div>{{ $user->id }}</div>
                                </div>
                                <div class="info-element">
                                    <span>ФИО</span>
                                    <div>{{ $user->lastname }} {{ $user->firstname }} {{ $user->patronomic }}</div>
                                </div>
                                <div class="info-element">
                                    <span>Дата рождения</span>
                                    <div>{{ $user->age }}</div>
                                </div>
                                <div class="info-element">
                                    <span>Место учебы/работы</span>
                                    <div>{{ $user->studywork }}</div>
                                </div>
                                <div class="info-element">
                                    <span>E-mail</span>
                                    <div>{{ $user->email }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="stage-users">
            <div class="container">
                <form method="POST" action="{{route('update_points')}}">
                    {{csrf_field()}}
                    <div class="col-md-12">
                        <a href="{{route('downloadAnswer', ['id'=>$user->id, 'id_user'=>$user->id])}}" class="btn btn-lg">Скачать ответ участника</a>
                    </div>
                    <div class="col-md-12">
                        <div class="form-input">
                            <input type="number" name="user" value="{{$user->id}}" style="display: none;"/>
                            <label for="points">Баллы</label>
                            <input class="form-control" name="points" type="number" required/>
                        </div>
                        <div style="margin-left: 40px;">
                            <button type="submit" class="btn-success btn-lg">Выставить баллы</button>
                            <a href="/home" class="btn-danger btn-lg">Отмена</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    @endforeach
@endsection
