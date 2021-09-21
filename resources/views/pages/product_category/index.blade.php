@extends('layouts.app')

@section('content')

<div class="container-fluid px-4">
    <h3 class="mt-4">Produk Kategori</h3>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active"></li>
    </ol>
    <div class="col-md-12 mb-4">
        <a href="{{ route('produk_category.create') }}" title="Tambah">
            <span class="border border-1 px-2 py-1">
                <i class="fas fa-plus"></i>
            </span>
        </a>
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
                    @foreach ($categories as $key => $category)
                    <tr>
                        <td class="text-center">{{ $key + 1 }}</td>
                        <td>{{ $category->category_name }}</td>
                        <td class="text-center">
                            <a href="{{ route('product_category.edit', [$category->id]) }}" class="mx-2" title="Lihat"><span class="border border-1 px-2 py-1"><i class="fas fa-edit"></i></span></a> |
                            <a href="{{ route('product_category.delete', [$category->id]) }}" class="mx-2" title="Hapus" onclick="return confirm('Yakin akan dihapus?')"><span class="border border-1 px-2 py-1"><i class="fas fa-trash"></i></span></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection

@section('script')

<script src="{{ asset('sbadmin/assets/simple-datatables.js') }}" crossorigin="anonymous"></script>
<script src="{{ asset('sbadmin/js/datatables-simple-demo.js') }}"></script>

@endsection
