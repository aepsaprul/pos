@extends('layouts.app')

@section('style')
<style>
    * {
        font-size: 12px;
    }
</style>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="container px-4">
            <div class="card">
                <div class="card-header">
                    Featured
                </div>
                <div class="card-body">
                    <div class="row gx-5">
                        <div class="col">
                            <div class="mb-1 row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control" id="staticEmail" value="email@example.com">
                                </div>
                            </div>
                            <div class="mb-1 row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control" id="staticEmail" value="email@example.com">
                                </div>
                            </div>
                            <div class="mb-1 row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control" id="staticEmail" value="email@example.com">
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="p-3 text-center">Total: <p class="h1">Rp. 200.000</p></div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-2">
                            <div class="mb-3">
                                <label for="kode_barang" class="form-label">Kode Barang</label>
                                <input type="text" class="form-control" id="kode_barang" name="kode_barang">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="mb-3">
                                <label for="nama_barang" class="form-label">Nama Barang</label>
                                <input type="text" class="form-control" id="nama_barang" name="nama_barang">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="mb-3">
                                <label for="stok" class="form-label">Stok</label>
                                <input type="text" class="form-control" id="stok" name="stok">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="mb-3">
                                <label for="harga_satuan" class="form-label">Harga Satuan (Rp)</label>
                                <input type="text" class="form-control" id="harga_satuan" name="harga_satuan">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="mb-3">
                                <label for="jml_jual" class="form-label">Jumlah Jual</label>
                                <input type="text" class="form-control" id="jml_jual" name="jml_jual">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="mb-3">
                                <label for="harga_akhir" class="form-label">Harga Akhir (Rp)</label>
                                <input type="text" class="form-control" id="harga_akhir" name="harga_akhir">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
