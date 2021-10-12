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
        <div class="container mt-2">
            <div class="row">
                <div class="col-sm-3">
                    <div class="mb-1 row">
                        <label for="invoice_number" class="col-sm-4 col-form-label">No Nota</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control form-control-sm" id="invoice_number" name="invoice_number" value="0001" readonly>
                        </div>
                    </div>
                    <div class="mb-1 row">
                        <label for="invoice_date" class="col-sm-4 col-form-label">Tanggal Nota</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control form-control-sm" id="invoice_date" name="invoice_date" value="{{ date('d-m-Y') }}" readonly>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="mb-1 row">
                        <label for="product_code" class="col-sm-4 col-form-label"><strong>Kode Produk</strong></label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control form-control-sm" id="product_code" name="product_code" autofocus>
                        </div>
                    </div>
                    <div class="mb-1 row">
                        <label for="quantity" class="col-sm-4 col-form-label"><strong>Quantity</strong></label>
                        <div class="col-sm-8">
                            <input type="number" min="0" class="form-control form-control-sm" id="quantity" name="quantity">
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="mb-1 row">
                        <label for="pay" class="col-sm-3 col-form-label"><strong>Bayar</strong></label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control form-control-sm" id="pay" name="pay">
                        </div>
                    </div>
                    <div class="mb-1 row">
                        <label for="change" class="col-sm-3 col-form-label">Kembalian</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control form-control-sm" id="change" name="change" readonly>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="row">
                        <div class="col-sm-12">
                            <input type="hidden" name="total_price" id="total_price" value="{{ $total_price }}">
                            <div class="p-3 text-center"><span class="h3">Rp. {{ rupiah($total_price) }}</span></div>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="d-flex justify-content-between">
                <div>
                    <div class="row">
                        <input type="hidden" class="form-control" id="product_id" name="product_id">
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="product_name" class="form-label">Nama Produk</label>
                                <input type="text" class="form-control form-control-sm" id="product_name" name="product_name" readonly>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="stock" class="form-label">Stok</label>
                                <input type="text" class="form-control form-control-sm" id="stock" name="stock" readonly>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="product_price" class="form-label">Harga Satuan (Rp)</label>
                                <input type="text" class="form-control form-control-sm" id="product_price" name="product_price" readonly>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="final_price" class="form-label">Harga Akhir (Rp)</label>
                                <input type="text" class="form-control form-control-sm" id="final_price" name="final_price" readonly>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    {{-- <button class="btn btn-success btn-sm py-3" type="button" style="width: 50%;">PRINT</button>
                    <button class="btn btn-danger btn-sm py-3" type="button" style="width: 50%;">RESET</button> --}}
                    <div class="btn-group" role="group" aria-label="Basic outlined example">
                        <button type="button" class="btn btn-success py-3 px-4">PRINT</button>
                        <button type="button" class="btn btn-outline-danger py-3 px-4">RESET</button>
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
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    $(document).ready(function() {
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        $('#product_code').on('keyup change', function() {
            var product_code = $('#product_code').val();
            var formData = {
                product_code: product_code,
                _token: CSRF_TOKEN
            }

            $.ajax({
                url: '{{ URL::route('cashier.product') }}',
                type: 'POST',
                data: formData,
                success: function(response) {
                    $('#product_id').val(response.product_id);
                    $('#product_name').val(response.product_name);
                    $('#stock').val(response.stock);
                    $('#quantity').val('1');

                    var product_price = format_rupiah(response.product_price);
                    $('#product_price').val(product_price);
                    $('#final_price').val(product_price);
                }
            });
        });

        $('#product_code').on('keypress', function(event) {
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
                    url: '{{ URL::route('cashier.sales_save') }}',
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
                    url: '{{ URL::route('cashier.sales_save') }}',
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
