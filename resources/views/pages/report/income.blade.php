@extends('layouts.app')

@section('style')
<link href="{{ asset('lib/datatables/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('lib/select2/css/select2.min.css') }}">

<style>
    .col-md-12,
    .col-md-12 button,
    .col-md-12 a {
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
            <h6 class="text-uppercase text-center">Data Laporan Laba Rugi</h6>
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            <div class="row mb-2 mt-1">
                <div class="col-md-2">
                    <label for="start_date">Tanggal Awal</label>
                    <input type="date" name="start_date" id="start_date" class="form-control form-control-sm">
                </div>
                <div class="col-md-2">
                    <label for="end_date">Tanggal Akhir</label>
                    <input type="date" name="end_date" id="end_date" class="form-control form-control-sm">
                </div>
                <div class="col-md-1">
                    <label for="start_date"></label>
                    <button class="btn btn-primary form-control btn-search"><i class="fas fa-search"></i></button>
                </div>
            </div>

            <div class="card">
                <div class="card-body table_data">

                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-2">
                            <div class="d-flex justify-content-between">
                                <div class="fw-bold">HPP Keseluruhan:</div>
                                <div class="total_product_price"></div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="d-flex justify-content-between">
                                <div class="fw-bold">Total Terjual:</div>
                                <div class="total_sold"></div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="d-flex justify-content-between">
                                <div class="fw-bold">Total Laba:</div>
                                <div class="total_profit h6 text-success"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mb-5"></div>
    </div>
</div>

@endsection

@section('script')
<script src="{{ asset('lib/datatables/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('lib/datatables/js/dataTables.bootstrap5.min.js') }}"></script>
<script src="{{ asset('lib/datatables/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('lib/datatables/js/jszip.min.js') }}"></script>
<script src="{{ asset('lib/datatables/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('lib/select2/js/select2.min.js') }}"></script>

<script>
    $(document).ready(function() {
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        salesAll();
        function salesAll() {
            $('.table_data').empty();
            $.ajax({
                url: '{{ URL::route('report.income_get_data') }}',
                type: 'GET',
                success: function(response) {
                    var invoice_val = "" +
                    "<table id=\"table_one\" class=\"table table-bordered\">" +
                        "<thead style=\"background-color: #32a893;\">" +
                            "<tr>" +
                                "<th class=\"text-white text-center fw-bold\">No</th>" +
                                "<th class=\"text-white text-center fw-bold\">Tanggal</th>" +
                                "<th class=\"text-white text-center fw-bold\">Nama Produk</th>" +
                                "<th class=\"text-white text-center fw-bold\">HPP</th>" +
                                "<th class=\"text-white text-center fw-bold\">Quantitiy</th>" +
                                "<th class=\"text-white text-center fw-bold\">Total HPP</th>" +
                                "<th class=\"text-white text-center fw-bold\">Terjual</th>" +
                            "</tr>" +
                        "</thead>" +
                        "<tbody>";

                            var sum_product_price = 0;
                            var sum_sub_total = 0;

                            $.each(response.sales, function(index, item) {
                                invoice_val += "" +
                                    "<tr";
                                    if (index % 2 == 1) {
                                       invoice_val += " class=\"tabel_active\"";
                                    }
                                    invoice_val += ">" +
                                        "<td class=\"text-center\">" + (index + 1) + "</td>";

                                        if (item.invoice) {
                                            invoice_val += "" +
                                                "<td>" + tanggal(item.invoice.date_recorded) + "</td>";
                                        } else {
                                            invoice_val += "" +
                                                "<td>Tanggal Kosong</td>";
                                        }

                                        if (item.product) {
                                            invoice_val += "" +
                                                "<td>" + item.product.product_name + "</td>" +
                                                "<td class=\"text-end\">" + format_rupiah(item.product.product_price) + "</td>" +
                                                "<td class=\"text-center\">" + item.quantity + "</td>" +
                                                "<td class=\"text-end\">" + format_rupiah((item.quantity * item.product.product_price)) + "</td>";
                                        } else {
                                            invoice_val += "" +
                                                "<td>Produk Kosong</td>" +
                                                "<td>HPP Kosong</td>" +
                                                "<td>Quantity Kosong</td>" +
                                                "<td>Total HPP Kosong</td>";
                                        }

                                    invoice_val += "" +
                                        "<td class=\"text-end\">" + format_rupiah(item.sub_total) + "</td>" +
                                    "</tr>";

                                    sum_product_price += parseFloat(item.quantity * item.product.product_price);
                                    sum_sub_total += parseFloat(item.sub_total);

                                    var total_profit =  sum_sub_total - sum_product_price;

                                    $('.total_product_price').html(format_rupiah(sum_product_price));
                                    $('.total_sold').html(format_rupiah(sum_sub_total));
                                    $('.total_profit').html(format_rupiah(total_profit));
                            });
                        invoice_val += "</tbody>" +
                    "</table>";

                    $('.table_data').append(invoice_val);

                    $('#table_one').DataTable({
                        'ordering': false
                    });
                }
            });
        }

        $('.btn-search').on('click', function(e) {
            e.preventDefault();
            $('.table_data').empty();

            if ($('#start_date').val() == "" || $('#end_date').val() == "") {
                alert('Tanggal harus diisi');
            } else {
                var formData = {
                    start_date: $('#start_date').val(),
                    end_date: $('#end_date').val(),
                    _token: CSRF_TOKEN
                }

                $.ajax({
                    url: '{{ URL::route('report.income_filter') }}',
                    type: 'POST',
                    data: formData,
                    success: function(response) {
                        var invoice_val = "" +
                        "<table id=\"table_one\" class=\"table table-bordered\">" +
                            "<thead style=\"background-color: #32a893;\">" +
                                "<tr>" +
                                    "<th class=\"text-white text-center fw-bold\">No</th>" +
                                    "<th class=\"text-white text-center fw-bold\">Tanggal</th>" +
                                    "<th class=\"text-white text-center fw-bold\">Nama Produk</th>" +
                                    "<th class=\"text-white text-center fw-bold\">HPP</th>" +
                                    "<th class=\"text-white text-center fw-bold\">Quantitiy</th>" +
                                    "<th class=\"text-white text-center fw-bold\">Total HPP</th>" +
                                    "<th class=\"text-white text-center fw-bold\">Terjual</th>" +
                                "</tr>" +
                            "</thead>" +
                            "<tbody>";

                                var sum_product_price = 0;
                                var sum_sub_total = 0;

                                $.each(response.sales, function(index, item) {
                                    invoice_val += "" +
                                        "<tr";
                                        if (index % 2 == 1) {
                                        invoice_val += " class=\"tabel_active\"";
                                        }
                                        invoice_val += ">" +
                                            "<td class=\"text-center\">" + (index + 1) + "</td>";

                                            if (item.invoice) {
                                                invoice_val += "" +
                                                    "<td>" + tanggal(item.invoice.date_recorded) + "</td>";
                                            } else {
                                                invoice_val += "" +
                                                    "<td>Tanggal Kosong</td>";
                                            }

                                            if (item.product) {
                                                invoice_val += "" +
                                                    "<td>" + item.product.product_name + "</td>" +
                                                    "<td class=\"text-end\">" + format_rupiah(item.product.product_price) + "</td>" +
                                                    "<td class=\"text-center\">" + item.quantity + "</td>" +
                                                    "<td class=\"text-end\">" + format_rupiah((item.quantity * item.product.product_price)) + "</td>";
                                            } else {
                                                invoice_val += "" +
                                                    "<td>Produk Kosong</td>" +
                                                    "<td>HPP Kosong</td>" +
                                                    "<td>Quantity Kosong</td>" +
                                                    "<td>Total HPP Kosong</td>";
                                            }

                                        invoice_val += "" +
                                            "<td class=\"text-end\">" + format_rupiah(item.sub_total) + "</td>" +
                                        "</tr>";

                                        sum_product_price += parseFloat(item.quantity * item.product.product_price);
                                        sum_sub_total += parseFloat(item.sub_total);

                                        var total_profit =  sum_sub_total - sum_product_price;

                                        $('.total_product_price').html(format_rupiah(sum_product_price));
                                        $('.total_sold').html(format_rupiah(sum_sub_total));
                                        $('.total_profit').html(format_rupiah(total_profit));
                                });
                            invoice_val += "</tbody>" +
                        "</table>";

                        $('.table_data').append(invoice_val);

                        $('#table_one').DataTable({
                            'ordering': false
                        });
                    }
                });
            }
        });

        // $('#opsi').on('change', function() {
        //     if ($(this).val() == "") {
        //         salesAll();
        //     }
        //     else {
        //         $('.card-body').empty();

        //         var id = $(this).val();
        //         var url = '{{ route("report.product_detail", ":id") }}';
        //         url = url.replace(':id', id );

        //         var formData = {
        //             id: id,
        //             _token: CSRF_TOKEN
        //         }
        //         $.ajax({
        //             url: url,
        //             data: formData,
        //             type: 'GET',
        //             success: function(response) {
        //                 var sales_val = "" +
        //                 "<table id=\"table_one\" class=\"table table-bordered\">" +
        //                     "<thead style=\"background-color: #32a893;\">" +
        //                         "<tr>" +
        //                             "<th class=\"text-white text-center fw-bold\">No</th>" +
        //                             "<th class=\"text-white text-center fw-bold\">Nama Produk</th>" +
        //                             "<th class=\"text-white text-center fw-bold\">Nama Kasir</th>" +
        //                             "<th class=\"text-white text-center fw-bold\">Kode Nota</th>" +
        //                             "<th class=\"text-white text-center fw-bold\">Quantity</th>" +
        //                             "<th class=\"text-white text-center fw-bold\">Total</th>" +
        //                         "</tr>" +
        //                     "</thead>" +
        //                     "<tbody>";
        //                         $.each(response.sales, function(index, item) {
        //                             sales_val += "" +
        //                             "<tr";
        //                             if (index % 2 == 1) {
        //                                sales_val += " class=\"tabel_active\"";
        //                             }
        //                             sales_val += ">" +
        //                                 "<td class=\"text-center\">" + (index + 1) + "</td>" +
        //                                 "<td class=\"text-center\">";

        //                                 if (item.product) {
        //                                     sales_val += item.product.product_name;
        //                                 } else {
        //                                     sales_val += "Produk Tidak Ada";
        //                                 }

        //                                 sales_val += "</td><td>";

        //                                 if (item.user) {
        //                                     sales_val += item.user.name;
        //                                 } else {
        //                                     sales_val += "User Tidak Ada";
        //                                 }

        //                                 sales_val += "</td><td>";

        //                                 if (item.invoice) {
        //                                     sales_val += item.invoice.code;
        //                                 } else {
        //                                     sales_val += "Invoice Tidak Ada";
        //                                 }

        //                             sales_val += "</td>" +
        //                                 "<td class=\"text-center\">" + item.quantity + "</td>" +
        //                                 "<td class=\"text-center\">" + format_rupiah(item.sub_total) + "</td>" +
        //                             "</tr>";
        //                         });
        //                     sales_val += "</tbody>" +
        //                 "</table>";

        //                 $('.card-body').append(sales_val);

        //                 $('#table_one').DataTable({
        //                     'ordering': false
        //                 });
        //             }
        //         });
        //     }
        // });
    } );
</script>
@endsection
