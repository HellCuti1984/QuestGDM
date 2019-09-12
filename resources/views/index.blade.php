<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Квест Патриоты</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
</head>
<body>
<div>
    @if (Route::has('login'))
        <div>
            @auth
                <a href="{{ url('/home') }}">Home</a>
                <a href="{{ url('/logout') }}">Logout</a>
            @else
                <a href="{{ route('login') }}">Login</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}">Register</a>
                @endif
            @endauth
        </div>
    @endif

    <div>
        @If (Route::has('login'))
            @auth
                <div class="title m-b-md">
                    <?=Auth::user()->name;?>
                </div>
            @else
                <div>Laravel</div>
            @endif
        @endauth
    </div>
</div>
</body>
</html>
