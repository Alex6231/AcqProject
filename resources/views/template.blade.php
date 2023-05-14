<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @yield('page-title')
    <link rel="icon" href="{{ asset('images/logo_without-name.jpg') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="{{ asset('css/font-awesome.css') }}" rel="stylesheet" type="text/css">
</head>
<body id="body">
<header class="header">
        <div class="wrapper">
            <a class="menu-button" href="/">Познакомиться</a>
            <div class="header-logo_container">
                <img src="{{ asset('images/logo_without-name.jpg') }}" alt="logo">
                <h1>Acquaint</h1>
            </div>
                @if(isset(Auth::user()->name))
                    <a class="menu-button" href="/logout">Выйти из аккаунта</a>
                @else
                <div class="header_auth-buttons">
                    <a class="menu-button" href="/login">Авторизация</a>
                    <a class="menu-button" href="/register">Регистрация</a>
                </div>
                @endif
        </div>
</header>
<main class="main">
    <div class="wrapper">
        @yield('content')
    </div>
</main>
<footer class="footer">
    <div class="wrapper">
        <ul class="footer_buttons">
            <li><a href="#" class="menu-button">О нас</a></li>
            <li><a href="#" class="menu-button">Контакты</a></li>
            <li><a href="#" class="menu-button">FAQ</a></li>
            <li><a href="#" class="menu-button">Админ панель</a></li>
        </ul>
        <img src="{{ asset('images/logo_with-name.jpg') }}" alt="logo">
    </div>
</footer>
<script src="{{ asset('js/imageShow.js') }}"></script>
</body>
</html>
