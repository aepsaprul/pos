@extends('layouts.app')

@section('style')
<style>
    .justify-content-center {
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
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="mb-1 row">
                                <label for="invoice_number" class="col-sm-4 col-form-label">No Nota</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="invoice_number" name="invoice_number" value="0001" disabled>
                                </div>
                            </div>
                            <div class="mb-1 row">
                                <label for="invoice_date" class="col-sm-4 col-form-label">Tanggal Nota</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="invoice_date" name="invoice_date" value="{{ date('d-m-Y') }}" disabled>
                                </div>
                            </div>
                            <div class="mb-1 row">
                                <label for="product_code" class="col-sm-4 col-form-label">Kode Produk</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="product_code" name="product_code" autofocus>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="row">
                                <div class="col-sm-12">
                                    <input type="hidden" name="total_price" id="total_price" value="{{ $total_price }}">
                                    <div class="p-3 text-center">Total: <p class="h1">Rp. {{ rupiah($total_price) }}</p></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <input type="hidden" class="form-control" id="product_id" name="product_id">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="product_name" class="form-label">Nama Produk</label>
                                <input type="text" class="form-control" id="product_name" name="product_name" disabled>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="mb-3">
                                <label for="stock" class="form-label">Stok</label>
                                <input type="text" class="form-control" id="stock" name="stock" disabled>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="mb-3">
                                <label for="product_price" class="form-label">Harga Satuan (Rp)</label>
                                <input type="text" class="form-control" id="product_price" name="product_price" disabled>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="mb-3">
                                <label for="quantity" class="form-label">Jumlah Jual</label>
                                <input type="number" class="form-control" id="quantity" name="quantity">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="mb-3">
                                <label for="final_price" class="form-label">Harga Akhir (Rp)</label>
                                <input type="text" class="form-control" id="final_price" name="final_price" disabled>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <table class="table table-bordered">
                <thead style="background-color: #32a893;">
                    <tr>
                        <th class="text-center text-white">No</th>
                        <th class="text-center text-white">Kode Produk</th>
                        <th class="text-center text-white">Nama Produk</th>
                        <th class="text-center text-white">Harga Satuan</th>
                        <th class="text-center text-white">Qty</th>
                        <th class="text-center text-white">Harga Akhir</th>
                        <th class="text-center text-white">Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sales as $key => $item)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $item->product->product_code }}</td>
                            <td>{{ $item->product->product_name }}</td>
                            <td>{{ $item->product->product_price }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td>{{ $item->product->product_price * $item->quantity }}</td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <form
                                        action="#"
                                        method="POST"
                                        class="d-inline">
                                            @method('delete')
                                            @csrf
                                                <button
                                                    class="border-0 bg-white"
                                                    onclick="return confirm('Yakin akan dihapus?')"
                                                    title="Hapus">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="card mt-4">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="mb-1 row">
                                        <label for="pay" class="col-sm-3 col-form-label">Bayar</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="pay" name="pay">
                                        </div>
                                    </div>
                                    <div class="mb-1 row">
                                        <label for="change" class="col-sm-3 col-form-label">Kembalian</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="change" name="change" disabled>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="row">
                                <div class="d-grid gap-2 mx-auto">
                                    <button class="btn btn-primary py-4" type="button">PRINT</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    $(document).ready(function() {
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        $('#product_code').on('keypress', function(event) {
            if (event.keyCode === 13) {
                var product_code = $('#product_code').val();
                var formData = {
                    product_code: product_code,
                    _token: CSRF_TOKEN
                }

                $.ajax({
                    url: '{{ URL::route('home.product') }}',
                    type: 'POST',
                    data: formData,
                    success: function(response) {
                        $('#product_id').val(response.product_id);
                        $('#product_name').val(response.product_name);
                        $('#stock').val(response.stock);

                        var product_price = format_rupiah(response.product_price);
                        $('#product_price').val(product_price);
                    }
                });
            }
        });

        $('#quantity').on('keyup change', function() {
            var quantity = $('#quantity').val();
            var product_price = $('#product_price').val();
            var product_price_replace = product_price.replace('.', '');

            var final_price = quantity * product_price_replace;
            var final_price_rp = format_rupiah(final_price);
            $('#final_price').val(final_price_rp);
        });

        $('#quantity').on('keypress', function(event) {
            if (event.keyCode === 13) {
                var product_id = $('#product_id').val();
                var quantity = $('#quantity').val();
                var product_price = $('#product_price').val();
                var product_price_replace = product_price.replace('.', '');
                var final_price = quantity * product_price_replace;

                var formData = {
                    quantity: quantity,
                    product_id: product_id,
                    sub_total: final_price,
                    _token: CSRF_TOKEN
                }

                $.ajax({
                    url: '{{ URL::route('home.sales_save') }}',
                    type: 'POST',
                    data: formData,
                    success: function(response) {
                        setTimeout(() => {
                            window.location.reload(1);
                        }, 100);
                    }
                });
            }
        });

        var payRupiah = document.getElementById("pay");
        payRupiah.addEventListener("keyup", function(e) {
            payRupiah.value = formatRupiah(this.value, "");
        });

        $('#pay').on('keypress change', function(event) {
            if (event.keyCode === 13) {
                var pay = $('#pay').val();
                var pay_int = pay.replace(/\./g,'');
                var total_price = $('#total_price').val();

                if (parseInt(pay_int) < parseInt(total_price)) {
                    var money_min = total_price - pay_int;
                    $('#change').val("Bayar kurang " + format_rupiah(money_min));
                } else if (pay == "") {
                    alert('Kolom bayar harus diisi');
                } else {
                    var calculate = pay_int - total_price;
                    $('#change').val(format_rupiah(calculate));
                }

            }
        });
    });
</script>
@endsection
