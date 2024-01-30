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
    <div class="w-100 " id="baseLayout">
        <div class="col-12" id="navbarContainer">
            <nav class="navbar navbar-expand-lg navbar-light ">

                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
                    <i class="ti ti-menu-2"></i>
                </button>
                <div class="page-title-mobile m-auto">@yield('title')</div>
                <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample"
                    aria-labelledby="offcanvasExampleLabel">
                    <div class="offcanvas-header flex-row flex-row-reverse">
                        <button type="button" class="btn text-reset" data-bs-dismiss="offcanvas"
                            aria-label="Close"><i class="ti ti-x" style="color:#010057; font-size:18px; font-weight:700"></i></button>
                    </div>
                    <div class="offcanvas-body">
                        <div>
                            <ul class="navbar-nav">
                                <li class="nav-item main-sidebar-menu-item">
                                    <a class="nav-link active" href="/users">
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
                </div>
            </nav>
        </div>
        <div class="col-2 mobile-none">
            <div class="sidebar main-sidebar-menu">
                <div class="logo-tmstore m-auto text-center">
                    <p class="logo-p">TM STORE</p>
                </div>
                <ul class="nav flex-column main-ul">
                    <li class="nav-item main-sidebar-menu-item">
                        <a class="nav-link active" href="/users">
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
        <div class="col-lg-10 col-sm-12">

            <div class="page-title mobile-none">
                {{-- @yield('page-title') --}}
                <div class="d-flex justify-content-between m-auto">

                    <p>@yield('title')</p>
                    
                    <div class="d-flex">
                        @yield('buttons')
                    </div>
                </div>
            </div>
            <div class="content">
                <div class="d-flex d-lg-none d-sm-block mb-4 text-end">

                    @yield('buttons')
                </div>
                @yield('content')
            </div>
        </div>
    </div>
    @include('layouts.scripts')
</body>

</html>
