@extends('template')
@section('index')
    <div class="profile">
        <div class="container">
            <nav>
                <a href="/">Главная страница</a>
                <a href="logout">Выход</a>
            </nav>

            <div class="my-profile">
                <h1>Мой профиль</h1>
                <div class="col-md-5">
                    <img class="img-responsive" src="@if(Auth::user()->avatar == null){{ URL::asset('image/none.png') }}@else{{ asset('storage/'.Auth::user()->avatar) }}@endif" />
                    <h2>Сменить аватар</h2>
                    <form action="{{route('image_upload')}}" method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <input type="file" name="image" required>
                        <button class="btn" type="submit">Загрузить</button>
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
                        <div class="position-info col-md-4">
                            <div>1</div>
                            <div>Место</div>
                        </div>
                        <div class="position-info col-md-4">
                            <div>24</div>
                            <div>Баллы за этап</div>
                        </div>
                        <div class="position-info col-md-4">
                            <div>Баллы</div>
                            <div>Место</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
