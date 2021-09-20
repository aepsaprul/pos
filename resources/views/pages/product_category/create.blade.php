@extends('layouts.app')

@section('content')

<div class="container-fluid px-4">
    <h3 class="mt-4">Tambah Produk Kategori</h3>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active"></li>
    </ol>
    <div class="card mb-4">
        <div class="card-header">
            <a href="{{ route('produk_category.index') }}" class="text-decoration-none"><i class="fas fa-arrow-left me-1"></i> Kembali</a>
        </div>
        <div class="card-body">
            <form action="{{ route('produk_category.store') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="category_name" class="form-label">Nama Produk Kategori</label>
                    <input type="text" class="form-control" id="category_name" name="category_name" placeholder="Masukkan nama kategori">
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>

@endsection
