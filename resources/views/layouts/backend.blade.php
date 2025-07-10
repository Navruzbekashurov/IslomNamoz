<!doctype html>
<html lang="{{ config('app.locale') }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>@yield('title', 'Admin Panel')</title>

    <!-- Favicons -->
    <link rel="shortcut icon" href="{{ asset('media/favicons/favicon.png') }}">
    <link rel="icon" sizes="192x192" type="image/png" href="{{ asset('media/favicons/favicon-192x192.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('media/favicons/apple-touch-icon-180x180.png') }}">

    @yield('css')

    @vite([
        'resources/sass/main.scss',
        'resources/js/codebase/app.js',
        'resources/js/dark-mode.js',
    ])

    @yield('js')
</head>

<body>
<div id="page-container" class="sidebar-o enable-page-overlay side-scroll page-header-modern main-content-boxed">
    <!-- Sidebar -->
    <nav id="sidebar">
        <div class="sidebar-content">
            <div class="content-header justify-content-lg-center">
                <div>
                    <a class="link-fx fw-bold tracking-wide mx-auto" href="/dashboard">
                        <i class="fa fa-mosque text-primary"></i>
                        <span class="fs-4 text-dual">Islom</span><span class="fs-4 text-primary">Namoz</span>
                    </a>
                </div>
            </div>

            <div class="js-sidebar-scroll">
                <div class="block-content block-content-full bg-body-light">
                    <a class="img-link" href="#"><img class="img-avatar" src="{{ asset('media/avatars/avatar15.jpg') }}" alt=""></a>
                    <div class="mt-2 fw-semibold">{{ Auth::user()->name }}
                    </div>
                </div>

                <div class="content-side content-side-full">
                    <a class="dropdown-item d-flex align-items-center justify-content-between" href="javascript:void(0)" id="toggle-dark-mode">
                        <span>Dark Mode</span>
                        <i class="fa fa-moon"></i>
                    </a>
                    <ul class="nav-main">
                        <li class="nav-main-item">
                        </li>
                        <li class="nav-main-heading">Funksiyalar</li>
                        <li class="nav-main-item">
                            <a class="nav-main-link{{ request()->is('allahnames') ? ' active' : '' }}" href="/allahnames">
                                <span class="nav-main-link-name">99 Ismlar</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link{{ request()->is('ramadancalendar') ? ' active' : '' }}" href="/ramadancalendar">
                                <span class="nav-main-link-name">Ramazon Taqvimi</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link{{ request()->is('region') ? ' active' : '' }}" href="/region">
                                <span class="nav-main-link-name">Viloyatlar</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link{{ request()->is('section') ? ' active' : '' }}" href="/section">
                                <span class="nav-main-link-name">Bo‘limlar</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link{{ request()->is('type') ? ' active' : '' }}" href="/type">
                                <span class="nav-main-link-name">Turlar</span>
                            </a>
                        </li>
                        <li class="nav-main-heading">Boshqa</li>
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="{{ route('dashboard') }}">
                                <i class="nav-main-link-icon fa fa-globe"></i>
                                <span class="nav-main-link-name">Bosh sahifa</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <!-- END Sidebar -->

    <!-- Header -->
    <header id="page-header">
        <div class="content-header">
            <div class="space-x-1">
                <button type="button" class="btn btn-sm btn-alt-secondary" data-toggle="layout" data-action="sidebar_toggle">
                    <i class="fa fa-fw fa-bars"></i>
                </button>
            </div>

            <div class="space-x-1">
                <div class="dropdown d-inline-block">
                    <button type="button" class="btn btn-sm btn-alt-secondary" data-bs-toggle="dropdown">
                        <i class="fa fa-user d-sm-none"></i>
                        <span class="d-none d-sm-inline-block fw-semibold">{{ Auth::user()->name }}
</span>
                        <i class="fa fa-angle-down opacity-50 ms-1"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-md dropdown-menu-end p-0">
                        <div class="px-2 py-3 bg-body-light rounded-top text-center">
                            <h5 class="h6 mb-0">Admin</h5>
                        </div>
                        <div class="p-2">
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="dropdown-item">
                                    <span>Chiqish</span>
                                    <i class="fa fa-fw fa-sign-out-alt opacity-25 float-end"></i>
                                </button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- END Header -->

    <!-- Main Content -->
    <main id="main-container">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer id="page-footer">
        <div class="content py-3 text-center fs-sm">
            <span class="fw-semibold">IslomNamoz</span> &copy; <span data-toggle="year-copy"></span>
        </div>
    </footer>
</div>
</body>
</html>
