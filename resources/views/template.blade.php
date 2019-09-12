<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Квест Патриоты</title>

    <!-- Style -->
    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}" />
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
</head>
<body>
@yield('index')
<footer>
    <a href="http://gdmnt.ru/" target="_blank">Городской дворец молодежи, &copy;<?=date('Y');?></a>
</footer>
</body>
</html>
