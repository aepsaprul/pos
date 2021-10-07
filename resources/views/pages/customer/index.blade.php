@extends('layouts.app')

@section('style')
<link href="{{ asset('lib/datatables/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet">

<style>
    .col-md-12 {
        font-size: 12px;
    }
    .fas {
        font-size: 14px;
    }
    .btn {
        padding: .2rem .6rem;
    }
</style>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h6 class="text-uppercase text-center">Data Customer</h6>
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif


            <div class="row mb-2">
                <div class="col-md-4">
                    <a href="#" class="mb-4 btn btn-outline-primary" title="Tambah"><i class="fas fa-plus"></i></a>
                </div>
            </div>

            <table id="table_one" class="table table-bordered">
                <thead class="bg-secondary">
                    <tr>
                        <th class="text-white text-center fw-bold">No</th>
                        <th class="text-white text-center fw-bold">Nama</th>
                        <th class="text-white text-center fw-bold">Telepon</th>
                        <th class="text-white text-center fw-bold">Email</th>
                        <th class="text-white text-center fw-bold">Alamat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>dsdsds</td>
                        <td>dsdsds</td>
                        <td>dsdsds</td>
                        <td>dsdsds</td>
                        <td>dsdsds</td>
                        <td>dsdsds</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection

@section('script')
<script src="{{ asset('lib/datatables/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('lib/datatables/js/dataTables.bootstrap5.min.js') }}"></script>
<script src="{{ asset('lib/datatables/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('lib/datatables/js/jszip.min.js') }}"></script>
<script src="{{ asset('lib/datatables/js/buttons.html5.min.js') }}"></script>

<script>
    $(document).ready(function() {
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        $('#table_one').DataTable();
    } );
</script>
@endsection
