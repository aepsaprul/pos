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
<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container-fluid">
                <a class="navbar-brand text-uppercase" href="#"><img src="{{ asset('assets/store.png') }}" alt="icon" style="max-width: 30px;"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 text-uppercase">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="{{ route('home') }}">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="{{ route('product_category.index') }}">Kategori</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="{{ route('product.index') }}">Produk</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Transaksi
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item border-bottom" href="#"><i class="fas fa-chevron-right"></i> Produk Masuk</a></li>
                                <li><a class="dropdown-item" href="#"><i class="fas fa-chevron-right"></i> Penjualan</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="{{ route('customer.index') }}">Customer</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="{{ route('supplier.index') }}">Supplier</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="{{ route('cashier.index') }}">Kasir</a>
                        </li>
                    </ul>
                    <div class="btn-group d-flex">
                        <button type="button" class="btn dropdown-toggle text-uppercase" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a href="{{ route('change.password.index') }}" class="dropdown-item text-uppercase" type="button">Ubah Password</a></li>
                            <li>
                                <a class="dropdown-item text-uppercase"
                                    href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>

        <main class="mt-5">
            @yield('content')
        </main>
    </div>

    {{-- <script src="{{ asset('lib/bootstrap-5/bootstrap.min.js') }}"></script> --}}
    <script src="{{ asset('lib/bootstrap-5/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('lib/datatables/js/jquery-3.5.1.js') }}"></script>
    <script src="{{ asset('lib/fontawesome-5/js/fontawesome.min.js') }}"></script>

    <script>
        function format_rupiah(bilangan) {
            var	number_string = bilangan.toString(),
                split	= number_string.split(','),
                sisa 	= split[0].length % 3,
                rupiah 	= split[0].substr(0, sisa),
                ribuan 	= split[0].substr(sisa).match(/\d{1,3}/gi);

            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }
            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;

            return rupiah;
        }

        function formatRupiah(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, "").toString(),
                split = number_string.split(","),
                sisa = split[0].length % 3,
                rupiah = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            // tambahkan titik jika yang di input sudah menjadi angka ribuan
            if (ribuan) {
                separator = sisa ? "." : "";
                rupiah += separator + ribuan.join(".");
            }

            rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
            return prefix == undefined ? rupiah : rupiah ? "" + rupiah : "";
        }
    </script>
    </script>

    @yield('script')
</body>
</html>

@endguest
