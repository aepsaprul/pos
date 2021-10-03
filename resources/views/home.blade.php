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
            <div class="card mb-4">
                <div class="card-header">
                    Tambah Barang
                </div>
                <div class="card-body">
                    <div class="row gx-5">
                        <div class="col">
                            <div class="mb-1 row">
                                <label for="nomor_nota" class="col-sm-2 col-form-label">No Nota</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="nomor_nota" name="nomor_nota" value="0001">
                                </div>
                            </div>
                            <div class="mb-1 row">
                                <label for="tanggal_nota" class="col-sm-2 col-form-label">Tanggal Nota</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="tanggal_nota" name="tanggal_nota" value="{{ date('d-m-Y') }}">
                                </div>
                            </div>
                            <div class="mb-1 row">
                                <label for="kode_barang" class="col-sm-2 col-form-label">Kode Barang</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="kode_barang" name="kode_barang" value="0002" autofocus>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="p-3 text-center">Total: <p class="h1">Rp. 0</p></div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="nama_barang" class="form-label">Nama Barang</label>
                                <input type="text" class="form-control" id="nama_barang" name="nama_barang" disabled>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="mb-3">
                                <label for="stok" class="form-label">Stok</label>
                                <input type="text" class="form-control" id="stok" name="stok" disabled>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="mb-3">
                                <label for="harga_satuan" class="form-label">Harga Satuan (Rp)</label>
                                <input type="text" class="form-control" id="harga_satuan" name="harga_satuan" disabled>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="mb-3">
                                <label for="jml_jual" class="form-label">Jumlah Jual</label>
                                <input type="number" class="form-control" id="jml_jual" name="jml_jual">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="mb-3">
                                <label for="harga_akhir" class="form-label">Harga Akhir (Rp)</label>
                                <input type="text" class="form-control" id="harga_akhir" name="harga_akhir" disabled>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <table class="table table-bordered">
                <thead style="background-color: #32a893;">
                    <tr>
                        <th class="text-center text-white">No</th>
                        <th class="text-center text-white">Kode Barang</th>
                        <th class="text-center text-white">Nama Barang</th>
                        <th class="text-center text-white">Harga Satuan</th>
                        <th class="text-center text-white">Jumlah</th>
                        <th class="text-center text-white">Harga Akhir</th>
                        <th class="text-center text-white">Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    $(document).ready(function() {
        $('#kode_barang').on('keypress', function(event) {
            if (event.keyCode === 13) {
                alert('dadfdfk');
            }
        });
    });
</script>
@endsection
