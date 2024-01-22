<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    @include('layouts.styles')
</head>

<body>
    <div class="sidebar main-sidebar-menu">
        <div class="logo-tmstore m-auto text-center">
            <img src="{{asset('/assets/images/logotest.png')}}" alt="">
        </div>
        <ul class="nav flex-column main-ul">
            <li class="nav-item main-sidebar-menu-item">
                <a class="nav-link active" href="/">
                    <i class="ti ti-users"></i> Пользователи
                </a>
            </li>
            <li class="nav-item main-sidebar-menu-item">
                <a class="nav-link" href="/categories">
                    <i class="ti ti-category"></i> Категория
                </a>
            </li>
            <li class="nav-item main-sidebar-menu-item">
                <a class="nav-link" href="/advertisements">
                    <i class="ti ti-clipboard-text"></i> Объявления
                </a>
            </li>
            <li class="nav-item main-sidebar-menu-item">
                <a class="nav-link" href="/cities">
                    <i class="ti ti-map-pin"></i> Города
                </a>
            </li>
            <li class="nav-item main-sidebar-menu-item">
                <a class="nav-link" href="/banners">
                    <i class="ti ti-photo"></i> Баннеры
                </a>
            </li>
            <li class="nav-item main-sidebar-menu-item">
                <a class="nav-link" href="/news">
                    <i class="ti ti-news"></i> Новости
                </a>
            </li>
            <li class="nav-item main-sidebar-menu-item">
                <a class="nav-link" href="/chat">
                    <i class="ti ti-message-circle-2"></i> Чат с пользователем
                </a>
            </li>
            <!-- Add more navigation links with icons as needed -->
        </ul>
    </div>

    <!-- Page Content -->
    <div class="col">

        <div class="page-title">
            @yield('page-title')
        </div>
        <div class="content container">
            @yield('content')
        </div>
    </div>
    @include('layouts.scripts')
</body>

</html>
