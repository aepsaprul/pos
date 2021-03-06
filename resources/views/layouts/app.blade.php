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
    <link href="{{ asset('assets/favicon.ico') }}" rel="icon" type="image/x-icon">

    <title>{{ config('app.name', 'POS') }}</title>


    <!-- Fonts -->
    <link href="{{ asset('lib/fontawesome-5/css/all.min.css') }}" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('lib/bootstrap-5/bootstrap.min.css') }}" rel="stylesheet">

    <!-- custom Styles -->
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">

    <style>
        nav {
            box-shadow: 0px -2px 9px 0px rgba(136,128,128,0.79);
            -webkit-box-shadow: 0px -2px 9px 0px rgba(136,128,128,0.79);
            -moz-box-shadow: 0px -2px 9px 0px rgba(136,128,128,0.79);
        }
        nav,
        nav a,
        nav .btn {
            font-size: 14px;
        }
        .active {
            border-bottom: 2px solid rgb(99, 56, 219);
        }
        .dropdown ul li {
            border-bottom: 1px solid rgb(209, 209, 209);
        }
        .dropdown ul li:last-child {
            border-bottom: none;
        }
        .list-navigation {
            border-bottom: 1px solid rgb(209, 209, 209);
        }
        .list-navigation:last-child {
            border-bottom: none;
        }
    </style>

    @yield('style')
</head>
<body style="background-color: #e0e0e0;">
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a
                    class="navbar-brand text-uppercase"
                    href="#">
                        <img src="{{ asset('assets/store.png') }}" alt="icon" style="max-width: 30px;">
                </a>
                <button
                    class="navbar-toggler"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent"
                    aria-expanded="false"
                    aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 text-uppercase">
                        @if (Auth::user()->roles_id == "0")
                            <li class="nav-item">
                                <a
                                    class="nav-link {{ set_active(['home', 'home/*']) }}"
                                    aria-current="page"
                                    href="{{ route('home') }}">
                                        Dashboard
                                </a>
                            </li>
                            <li class="nav-item dropdown">
                                <a
                                    class="nav-link {{ set_active(['master', 'master/*']) }}
                                    dropdown-toggle"
                                    href="#"
                                    id="navbarDropdown"
                                    role="button"
                                    data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                        Master
                                </a>
                                <ul
                                    class="dropdown-menu"
                                    aria-labelledby="navbarDropdown">
                                    <li>
                                        <a
                                            class="dropdown-item"
                                            href="{{ route('employee.index') }}">
                                                <i class="fas fa-chevron-right"></i>
                                                    Karyawan
                                        </a>
                                    </li>
                                    <li>
                                        <a
                                            class="dropdown-item"
                                            href="{{ route('position.index') }}">
                                                <i class="fas fa-chevron-right"></i>
                                                    Jabatan
                                        </a>
                                    </li>
                                    <li>
                                        <a
                                            class="dropdown-item"
                                            href="{{ route('nav.index') }}">
                                                <i class="fas fa-chevron-right"></i>
                                                    Navigasi
                                        </a>
                                    </li>
                                    <li>
                                        <a
                                            class="dropdown-item"
                                            href="{{ route('roles.index') }}">
                                                <i class="fas fa-chevron-right"></i>
                                                    Roles
                                        </a>
                                    </li>
                                    <li>
                                        <a
                                            class="dropdown-item"
                                            href="{{ route('user.index') }}">
                                                <i class="fas fa-chevron-right"></i>
                                                    User
                                        </a>
                                    </li>
                                    <li>
                                        <a
                                            class="dropdown-item"
                                            href="{{ route('product_category.index') }}">
                                                <i class="fas fa-chevron-right"></i>
                                                    Kategori Produk
                                        </a>
                                    </li>
                                    <li>
                                        <a
                                            class="dropdown-item"
                                            href="{{ route('product.index') }}">
                                                <i class="fas fa-chevron-right"></i>
                                                    Produk
                                        </a>
                                    </li>
                                    <li>
                                        <a
                                            class="dropdown-item"
                                            href="{{ route('shop.index') }}">
                                                <i class="fas fa-chevron-right"></i>
                                                    Toko
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a
                                    class="nav-link {{ set_active(['product_shop', 'product_shop/*']) }}"
                                    aria-current="page"
                                    href="{{ route('product_shop.index') }}">
                                        Produk
                                </a>
                            </li>
                            <li class="nav-item dropdown">
                                <a
                                    class="nav-link {{ set_active(['inventory_transaction', 'inventory_transaction/*']) }}
                                    dropdown-toggle"
                                    href="#"
                                    id="navbarDropdown"
                                    role="button"
                                    data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                        Transaksi Gudang
                                </a>
                                <ul
                                    class="dropdown-menu"
                                    aria-labelledby="navbarDropdown">
                                    <li>
                                        <a
                                            class="dropdown-item"
                                            href="{{ route('product_in.index') }}">
                                                <i class="fas fa-chevron-right"></i>
                                                    Produk Masuk
                                        </a>
                                    </li>
                                    <li>
                                        <a
                                            class="dropdown-item"
                                            href="{{ route('inventory_invoice.index') }}">
                                                <i class="fas fa-chevron-right"></i>
                                                    Produk Keluar
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a
                                    class="nav-link {{ set_active(['shop_transaction', 'shop_transaction/*']) }}
                                    dropdown-toggle"
                                    href="#"
                                    id="navbarDropdown"
                                    role="button"
                                    data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                        Transaksi Toko
                                </a>
                                <ul
                                    class="dropdown-menu"
                                    aria-labelledby="navbarDropdown">
                                    <li>
                                        <a
                                            class="dropdown-item"
                                            href="{{ route('received_product.index') }}">
                                                <i class="fas fa-chevron-right"></i>
                                                    Produk Masuk
                                        </a>
                                    </li>
                                    <li>
                                        <a
                                            class="dropdown-item"
                                            href="{{ route('invoice.index') }}">
                                                <i class="fas fa-chevron-right"></i>
                                                    Penjualan
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            {{-- <li class="nav-item">
                                <a
                                    class="nav-link {{ set_active(['inventory_stock', 'inventory_stock/*']) }}"
                                    aria-current="page"
                                    href="{{ route('inventory_stock.index') }}">
                                        Stok Gudang
                                </a>
                            </li>
                            <li class="nav-item">
                                <a
                                    class="nav-link {{ set_active(['shop_stock', 'shop_stock/*']) }}"
                                    aria-current="page"
                                    href="{{ route('shop_stock.index') }}">
                                        Stok Toko
                                </a>
                            </li> --}}
                            <li class="nav-item">
                                <a
                                    class="nav-link {{ set_active(['customer', 'customer/*']) }}"
                                    aria-current="page"
                                    href="{{ route('customer.index') }}">
                                        Customer
                                </a>
                            </li>
                            <li class="nav-item">
                                <a
                                    class="nav-link {{ set_active(['supplier', 'supplier/*']) }}"
                                    ria-current="page"
                                    href="{{ route('supplier.index') }}">
                                        Supplier
                                </a>
                            </li>
                            <li class="nav-item">
                                <a
                                    class="nav-link {{ set_active(['inventory_cashier', 'inventory_cashier/*']) }}"
                                    aria-current="page"
                                    href="{{ route('inventory_cashier.index') }}">
                                        Kasir
                                </a>
                            </li>
                            <li class="nav-item dropdown">
                                <a
                                    class="nav-link {{ set_active(['cashier', 'cashier/*']) }}
                                    dropdown-toggle"
                                    href="#"
                                    id="navbarDropdown"
                                    role="button"
                                    data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                        Kasir
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li>
                                        <a
                                            class="dropdown-item"
                                            href="{{ route('cashier.index') }}">
                                                <i class="fas fa-chevron-right"></i>
                                                    Cash
                                        </a>
                                    </li>
                                    <li>
                                        <a
                                            class="dropdown-item"
                                            href="{{ route('cashier.credit') }}">
                                                <i class="fas fa-chevron-right"></i>
                                                    Tempo
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a
                                    class="nav-link {{ set_active(['report', 'report/*']) }}
                                    dropdown-toggle"
                                    href="#"
                                    id="navbarDropdown"
                                    role="button"
                                    data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                        Laporan
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li>
                                        <a
                                            class="dropdown-item"
                                            href="{{ route('report.index') }}">
                                                <i class="fas fa-chevron-right"></i>
                                                    Penjualan
                                        </a>
                                    </li>
                                    <li>
                                        <a
                                            class="dropdown-item"
                                            href="{{ route('report.customer_index') }}">
                                                <i class="fas fa-chevron-right"></i>
                                                    Customer
                                        </a>
                                    </li>
                                    <li>
                                        <a
                                            class="dropdown-item"
                                            href="{{ route('report.product_index') }}">
                                                <i class="fas fa-chevron-right"></i>
                                                    Produk
                                        </a>
                                    </li>
                                    <li>
                                        <a
                                            class="dropdown-item"
                                            href="{{ route('report.income_index') }}">
                                                <i class="fas fa-chevron-right"></i>
                                                    Laba Rugi
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        @else
                            @foreach (Auth::user()->roles->rolesNavMain as $item)
                                @if ($item->navMain->navSub->isEmpty())
                                    <li class="nav-item">
                                        <a
                                            class="nav-link"
                                            aria-current="page"
                                            href="{{ url($item->navMain->link) }}">
                                                {{ $item->navMain->title }}
                                        </a>
                                    </li>
                                @else
                                    <li class="nav-item dropdown">
                                        <a
                                            class="nav-link dropdown-toggle"
                                            href="#"
                                            id="navbarDropdown"
                                            role="button"
                                            data-bs-toggle="dropdown"
                                            aria-expanded="false">
                                                {{ $item->navMain->title }}
                                        </a>
                                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            @foreach (Auth::user()->roles->rolesNavSub as $nav_sub)
                                                @if ($item->nav_main_id == $nav_sub->navSub->nav_main_id)
                                                    <li class="list-navigation">
                                                        <a
                                                            class="dropdown-item"
                                                            href="{{ url($nav_sub->navSub->link) }}">
                                                                <i class="fas fa-chevron-right"></i>
                                                                    {{ $nav_sub->navSub->title }}
                                                        </a>
                                                    </li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    </li>
                                @endif
                            @endforeach
                        @endif
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

        function tanggal(date) {
            var date = new Date(date);
            var tahun = date.getFullYear();
            var nomorbulan = date.getMonth() + 1;
            var bulan = date.getMonth();
            var tanggal = date.getDate();
            var hari = date.getDay();
            var jam = date.getHours();
            var menit = date.getMinutes();
            var detik = date.getSeconds();
            switch(hari) {
            case 0: hari = "Minggu"; break;
            case 1: hari = "Senin"; break;
            case 2: hari = "Selasa"; break;
            case 3: hari = "Rabu"; break;
            case 4: hari = "Kamis"; break;
            case 5: hari = "Jum'at"; break;
            case 6: hari = "Sabtu"; break;
            }
            switch(bulan) {
            case 0: bulan = "Januari"; break;
            case 1: bulan = "Februari"; break;
            case 2: bulan = "Maret"; break;
            case 3: bulan = "April"; break;
            case 4: bulan = "Mei"; break;
            case 5: bulan = "Juni"; break;
            case 6: bulan = "Juli"; break;
            case 7: bulan = "Agustus"; break;
            case 8: bulan = "September"; break;
            case 9: bulan = "Oktober"; break;
            case 10: bulan = "November"; break;
            case 11: bulan = "Desember"; break;
            }

            return tampilTanggal = tanggal + "-" + nomorbulan + "-" + tahun;
            // var tampilWaktu = "Jam: " + jam + ":" + menit + ":" + detik;
            // console.log(tampilTanggal);
            // console.log(tampilWaktu);
        }
    </script>

    @yield('script')
</body>
</html>

@endguest
