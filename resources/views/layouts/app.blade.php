@guest
    @yield('content')
@else

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link href="{{ asset('lib/fontawesome/css/fontawesome.css') }}" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('lib/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    @yield('style')
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'POS') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse justify-content-between" id="navbarSupportedContent">
                    <div>
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item">
                                <a class="nav-link text-uppercase" aria-current="page" href="#">Dashboard</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-uppercase" aria-current="page" href="#">Master</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-uppercase" aria-current="page" href="#">Pembelian</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-uppercase" aria-current="page" href="#">Stok</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-uppercase" aria-current="page" href="#">Produksi</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-uppercase" aria-current="page" href="#">Kas/Bank</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-uppercase" aria-current="page" href="#">Penjualan</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-uppercase" aria-current="page" href="#">Akuntansi</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-uppercase" aria-current="page" href="#">Efaktur</a>
                            </li>
                        </ul>
                    </div>
                    <div>
                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">
                            <!-- Authentication Links -->
                            <div class="dropdown">
                                <button class="btn btn-default btn-sm dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                    {{ Auth::user()->name }}
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <li><a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a></li>
                                </ul>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <script src="{{ asset('lib/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('lib/jquery/jquery.js') }}"></script>

    @yield('script')
</body>
</html>
@endguest
