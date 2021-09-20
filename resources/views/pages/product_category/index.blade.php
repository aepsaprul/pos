@extends('layouts.app')

@section('content')

<div class="container-fluid px-4">
    <h3 class="mt-4">Dashboard</h3>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active"></li>
    </ol>
    <div class="col-md-12 mb-4">
        <span class="border border-1 px-2 py-1">
            <i class="fas fa-plus"></i>
        </span>
    </div>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Data Produk Kategori
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Nama Kategori</th>
                        <th class="text-center">#</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Tiger Nixon</td>
                        <td class="text-center">
                            <a href="#" class="border-0 bg-white text-dark mx-2" title="Lihat"><i class="fas fa-edit"></i></a> |
                            <a href="#" class="text-dark mx-2" title="Print"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection

@section('script')

<script src="{{ asset('sbadmin/assets/chart.min.js') }}" crossorigin="anonymous"></script>
<script src="{{ asset('sbadmin/assets/demo/chart-area-demo.js') }}"></script>
<script src="{{ asset('sbadmin/assets/demo/chart-bar-demo.js') }}"></script>
<script src="{{ asset('sbadmin/assets/simple-datatables.js') }}" crossorigin="anonymous"></script>
<script src="{{ asset('sbadmin/js/datatables-simple-demo.js') }}"></script>

@endsection
