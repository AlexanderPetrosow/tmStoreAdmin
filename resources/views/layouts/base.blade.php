<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="token" id="token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    @include('layouts.styles')
</head>

<body>
    <div class="d-flex w-100 ">
        <div class="col-12 d-md-none">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item active">
                            <a class="nav-link" href="/">
                                <i class="ti ti-users"></i> Пользователи
                            </a>
                        </li>
                        <li class="nav-item">
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
                    </ul>
                </div>
            </nav>
        </div>
        <div class="col-2 mobile-none">
            <div class="sidebar main-sidebar-menu">
                <div class="logo-tmstore m-auto text-center">
                    <img src="{{ asset('/assets/images/logotest.png') }}" alt="">
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
                </ul>
            </div>
        </div>



        <!-- Page Content -->
        <div class="col-10">

            <div class="page-title">
                {{-- @yield('page-title') --}}
                <div class="d-flex justify-content-between m-auto">

                    <p>@yield('title')</p>
                    <div class="d-flex">

                        @yield('buttons')
                    </div>
                </div>
            </div>
            <div class="content">
                @yield('content')
            </div>
        </div>
    </div>
    @include('layouts.scripts')
</body>

</html>
