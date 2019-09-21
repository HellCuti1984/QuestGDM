@extends('template')

@section('index')
    <nav>
        <div class="container">
            <a style="float: left;">Здраствуйсте, {{ Auth::user()->name }}</a>
            <a href="/">Главная страница</a>
            <a href="logout">Выход</a>
        </div>
    </nav>

    <div class="admin-profile-quest">
        <div class="container">
            <div class="col-md-5">
                <img class="img-responsive" src="{{ URL::asset('image/none.png') }}"/>
            </div>
        </div>
    </div>
@endsection
