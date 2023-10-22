<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sample</title>
    <link rel="icon" type="image/x-icon" href="{{asset('assets/img/Contest.ico')}}">

    <!-- Style -->
    <link href="{{asset('assets/css/jetbrains.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/jetbrains-components.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/bootstrap-grid.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/contest-main.css')}}" rel="stylesheet">
    <!-- End style -->

    <!-- Plugin css for this page -->
    @yield('plugin_css_for_this_page')
    <!-- End Plugin css for this page -->
</head>
<body class="theme-dark">
<!-- Theme change  -->
<script src="{{asset('assets/js/theme.js')}}"></script>
<!-- End theme change  -->

<div class="page">
    <!-- Header -->
    <header class="d-flex flex-wrap justify-content-md-between mb-4 px-4 border-bottom">
        <!-- Gradient -->
        <div class="gradient" style="background: var(--gradient-4)"></div>
        <a href="{{route('index')}}" class="link link-default link-underline-none tb ms-2 d-flex align-items-center" >
            <img src="{{asset('assets/img/Contest.png')}}" class="logo me-2">
            <h6>Твой Кролик Написал</h6>
        </a>

        <div class="text-end d-inline-flex align-items-center">
            <a class="link link-default tb ms-3 d-inline-flex align-items-center" href="https://github.com/Voyadger-Odin/hakaton-2023-axenix" target="_blank">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-github me-2" viewBox="0 0 16 16">
                    <path d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.012 8.012 0 0 0 16 8c0-4.42-3.58-8-8-8z"></path>
                </svg> GitHub</a>
            <a class="link link-default tb ms-3 d-inline-flex align-items-center" href="{{route('index')}}">Главная</a>
            <a class="link link-default tb ms-3 d-inline-flex align-items-center" href="{{route('stock')}}">Склад</a>
            <a class="link link-default tb ms-3 d-inline-flex align-items-center" href="{{route('analytics')}}">Аналитика</a>

            <div class="drop-down tb ms-3">
                <a id="drop-down-btn-2" class="drop-down__button link-default">Тема интерфейса</a>
                <ul class="drop-down__list drop-down__list-right">
                    <li class="drop-down__list-item" data-value="8"><h6>Тема интерфейса</h6></li>
                    <li class="drop-down__list-delimiter"></li>
                    <li class="drop-down__list-item"><button onclick="setLightTheme()" class="btn btn-link link-default">Светлая тема</button></li>
                    <li class="drop-down__list-item"><button onclick="setDarkTheme()" class="btn btn-link link-default">Тёмная тема</button></li>
                    <li class="drop-down__list-item"><button onclick="setSystemTheme()" class="btn btn-link link-default">Системная тема</button></li>
                </ul>
            </div>
        </div>
    </header>
    <!-- End header -->

    <!-- Body -->
    <div class="main-panel align-items-center">
        @yield('body')
    </div>
    <!-- End body -->

    <!-- Footer -->
    <footer class="text-center">
        <!-- Copyright -->
        <div class="text-end d-inline-flex align-items-center p-4">
            <span class="tb">© 2023 Все права защищены.</span>
            <a class="link tb ms-3 d-inline-flex align-items-center" href="https://github.com/Voyadger-Odin" target="_blank">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-github me-2" viewBox="0 0 16 16">
                    <path d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.012 8.012 0 0 0 16 8c0-4.42-3.58-8-8-8z"></path>
                </svg>
                <span style="margin-left: 5px">Voyadger-Odin</span>
            </a>
            <a class="link tb ms-3 d-inline-flex align-items-center" href="https://t.me/rosetomorrow" target="_blank">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telegram" viewBox="0 0 16 16">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.287 5.906c-.778.324-2.334.994-4.666 2.01-.378.15-.577.298-.595.442-.03.243.275.339.69.47l.175.055c.408.133.958.288 1.243.294.26.006.549-.1.868-.32 2.179-1.471 3.304-2.214 3.374-2.23.05-.012.12-.026.166.016.047.041.042.12.037.141-.03.129-1.227 1.241-1.846 1.817-.193.18-.33.307-.358.336a8.154 8.154 0 0 1-.188.186c-.38.366-.664.64.015 1.088.327.216.589.393.85.571.284.194.568.387.936.629.093.06.183.125.27.187.331.236.63.448.997.414.214-.02.435-.22.547-.82.265-1.417.786-4.486.906-5.751a1.426 1.426 0 0 0-.013-.315.337.337 0 0 0-.114-.217.526.526 0 0 0-.31-.093c-.3.005-.763.166-2.984 1.09z"></path>
                </svg>
                <span style="margin-left: 5px">rosetomorrow</span>
            </a>
        </div>
        <!-- Copyright -->
    </footer>
    <!-- End footer -->
</div>


<!-- Scripts -->
<script src="{{asset('assets/js/jetbrains.js')}}"></script>
@yield('scripts')
<!-- End scripts -->
</body>
</html>
