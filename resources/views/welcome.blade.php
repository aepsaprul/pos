<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'POS') }}</title>

    <!-- Fonts -->
    <link href="{{ asset('lib/fontawesome-5/css/all.min.css') }}" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('lib/bootstrap-5/bootstrap.min.css') }}" rel="stylesheet">

    <style>
        nav {
            box-shadow: 0px -2px 9px 0px rgba(136,128,128,0.79);
            -webkit-box-shadow: 0px -2px 9px 0px rgba(136,128,128,0.79);
            -moz-box-shadow: 0px -2px 9px 0px rgba(136,128,128,0.79);
        }
    </style>

    @yield('style')
</head>
<body style="background-color: #e0e0e0;">
    <div id="app">
        <nav class="navbar navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand"><img src="{{ asset('assets/store.png') }}" alt="icon" style="max-width: 30px;"></a>
                <div class="d-flex">
                    <a class="nav-link text-uppercase" aria-current="page" href="{{ route('login') }}">Login</a>
                </div>
            </div>
        </nav>
        <main class="mt-5">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <img src="{{ asset('assets/img_home.png') }}" alt="img_home" style="max-width: 35%">
                </div>
            </div>
        </main>
    </div>

    {{-- <script src="{{ asset('lib/bootstrap-5/bootstrap.min.js') }}"></script> --}}
    <script src="{{ asset('lib/bootstrap-5/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('lib/datatables/js/jquery-3.5.1.js') }}"></script>
    <script src="{{ asset('lib/fontawesome-5/js/fontawesome.min.js') }}"></script>
</body>
</html>
