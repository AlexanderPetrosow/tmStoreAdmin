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
@php
    $menu = [
        [
            'name'=>'Пользователи',
            'route'=>'users',
            'icon'=>'users'
        ],
        [
            'name'=>'Категория',
            'route'=>'categories',
            'icon'=>'category'
        ],
        [
            'name'=>'Объявления',
            'route'=>'advertisements',
            'icon'=>'clipboard-text'
        ],
        [
            'name'=>'Города',
            'route'=>'cities',
            'icon'=>'map-pin'
        ],
        [
            'name'=>'Баннеры',
            'route'=>'banners',
            'icon'=>'photo'
        ],
        [
            'name'=>'Новости',
            'route'=>'news',
            'icon'=>'news'
        ],
        [
            'name'=>'Чат с пользователем',
            'route'=>'chat',
            'icon'=>'message-circle-2'
        ]
    ];
@endphp
<body>
    <div class="loading bg-white vh-100 vw-100 position-fixed justify-content-center align-items-center" style="display: flex; z-index: 3">
        <span class="loader"></span>
    </div>
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
                                @foreach ($menu as $m)
                                <li class="nav-item main-sidebar-menu-item">
                                    <a class="nav-link " href="/{{$m['route']}}/{{Route::currentRouteName()}}">
                                        <i class="ti ti-{{$m['icon']}}"></i>{{$m['name']}}
                                    </a>
                                </li>
                                @endforeach
                                <li class="nav-item main-sidebar-menu-item">
                                    <a href="/logout" class="nav-link">
                                        <i class="ti ti-logout"></i>Выйти
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
                    @foreach ($menu as $m)
                    <li class="nav-item main-sidebar-menu-item @if(Route::currentRouteName() == $m['route'])menu-active @endif">
                        <a class="nav-link" href="/{{$m['route']}}">
                            <i class="ti ti-{{$m['icon']}}"></i>{{$m['name']}}
                        </a>
                    </li>
                    @endforeach
                    <li class="nav-item main-sidebar-menu-item">
                        <a href="/logout" class="nav-link">
                            <i class="ti ti-logout"></i>Выйти
                        </a>
                    </li>
                </ul>
            </div>
        </div>



        <!-- Page Content -->
        <form method="POST" class="col-lg-10 col-sm-12">
            @csrf
            <div class="page-title mobile-none">
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
        </form>
    </div>
    @include('layouts.scripts')
</body>

</html>
