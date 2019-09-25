<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Квест Патриоты</title>

    <!-- Style -->
    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.css') }}"/>
    <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}"/>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <script src="https://cdn.ckeditor.com/ckeditor5/12.4.0/classic/ckeditor.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/12.4.0/classic/translations/ru.js"></script>
</head>
<body>
<div class="content">
    @yield('index')
</div>
<footer>
    <a href="http://gdmnt.ru/" target="_blank">ГДМ &copy;<?=date('Y');?></a>
</footer>

<script src="https://cdn.ckeditor.com/ckeditor5/12.4.0/classic/ckeditor.js"></script>
</body>
</html>
