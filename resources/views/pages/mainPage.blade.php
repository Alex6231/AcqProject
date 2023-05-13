<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Регистрация</title>
    <link rel="stylesheet" href="/css/style.css">
    <link href="{{ asset('css/font-awesome.css') }}" rel="stylesheet" type="text/css">
</head>
<body id="body">
<header>
    <div class="wrapper"></div>
</header>
<main>
    <div class="wrapper">
        <div class="users_container">
            @foreach($users as $user)

            @endforeach
        </div>
    </div>
</main>
<footer>
    <div class="wrapper"></div>
</footer>
</body>
</html>
