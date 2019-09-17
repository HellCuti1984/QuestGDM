@extends('template')

@section('index')
    <nav>
        <a>Здраствуйсте, {{ Auth::user()->name }}</a>
        <a href="/">Главная страница</a>
        <a href="logout">Выход</a>
    </nav>
@endsection
