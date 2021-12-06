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
            <h6 class="text-uppercase text-center">Data Laporan Penjualan</h6>
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            <div class="row mb-2 mt-1">
                <div class="col-md-2">
                    <label for="opsi">Pilih Opsi</label>
                    <select name="opsi" id="opsi" class="form-control form-control-sm">
                        <option value="">--Pilih Opsi--</option>
                        <option value="1">Data Keseluruhan</option>
                        <option value="2">Data Bukan Customer</option>
                        <option value="3">Data Customer</option>
                    </select>
                </div>
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
                <div class="card-body">

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

        invoiceSalesCurrent();
        function invoiceSalesCurrent() {
            $('.card-body').empty();
            $.ajax({
                url: '{{ URL::route('report.sales_get_data_current') }}',
                type: 'GET',
                success: function(response) {
                    var invoice_val = "" +
                    "<table id=\"table_one\" class=\"table table-bordered\">" +
                        "<thead style=\"background-color: #32a893;\">" +
                            "<tr>" +
                                "<th class=\"text-white text-center fw-bold\">No</th>" +
                                "<th class=\"text-white text-center fw-bold\">Tanggal</th>" +
                                "<th class=\"text-white text-center fw-bold\">Nama Kasir</th>" +
                                "<th class=\"text-white text-center fw-bold\">Customer</th>" +
                                "<th class=\"text-white text-center fw-bold\">Nego</th>" +
                                "<th class=\"text-white text-center fw-bold\">Kode Nota</th>" +
                                "<th class=\"text-white text-center fw-bold\">Total</th>" +
                            "</tr>" +
                        "</thead>" +
                        "<tbody>";
                            $.each(response.invoices, function(index, item) {
                                invoice_val += "" +
                                    "<tr";
                                    if (index % 2 == 1) {
                                       invoice_val += " class=\"tabel_active\"";
                                    }
                                    invoice_val += ">" +
                                        "<td class=\"text-center\">" + (index + 1) + "</td>" +
                                        "<td class=\"text-center\">" + tanggal(item.date_recorded) + "</td>" +
                                        "<td class=\"text-center\">";

                                        if (item.user) {
                                            invoice_val += item.user.name;
                                        } else {
                                            invoice_val += "User Tidak Ada";
                                        }

                                        invoice_val += "</td><td>";

                                        if (item.customer) {
                                            invoice_val += "<span class=\"text-primary\">" + item.customer.customer_name + "</span>";
                                        } else {
                                            invoice_val += "Customer Tidak Ada";
                                        }

                                    invoice_val += "</td>" +
                                        "<td class=\"text-center\">" + item.bid + "</td>" +
                                        "<td class=\"text-center\">" + item.code + "</td>" +
                                        "<td class=\"text-center\">" + format_rupiah(item.total_amount) + "</td>" +
                                    "</tr>";
                            });
                        invoice_val += "</tbody>" +
                    "</table>";

                    $('.card-body').append(invoice_val);

                    $('#table_one').DataTable({
                        'ordering': false
                    });
                }
            });
        }

        function invoiceSalesAll() {
            $('.card-body').empty();

            var formData = {
                opsi: $('#opsi').val(),
                start_date: $('#start_date').val(),
                end_date: $('#end_date').val(),
                _token: CSRF_TOKEN
            }

            $.ajax({
                url: '{{ URL::route('report.sales_get_data') }}',
                type: 'POST',
                data: formData,
                success: function(response) {
                    console.log(response.invoices);
                    var invoice_val = "" +
                    "<table id=\"table_one\" class=\"table table-bordered\">" +
                        "<thead style=\"background-color: #32a893;\">" +
                            "<tr>" +
                                "<th class=\"text-white text-center fw-bold\">No</th>" +
                                "<th class=\"text-white text-center fw-bold\">Tanggal</th>" +
                                "<th class=\"text-white text-center fw-bold\">Nama Kasir</th>" +
                                "<th class=\"text-white text-center fw-bold\">Customer</th>" +
                                "<th class=\"text-white text-center fw-bold\">Nego</th>" +
                                "<th class=\"text-white text-center fw-bold\">Kode Nota</th>" +
                                "<th class=\"text-white text-center fw-bold\">Total</th>" +
                            "</tr>" +
                        "</thead>" +
                        "<tbody>";
                            $.each(response.invoices, function(index, item) {
                                invoice_val += "" +
                                    "<tr";
                                    if (index % 2 == 1) {
                                       invoice_val += " class=\"tabel_active\"";
                                    }
                                    invoice_val += ">" +
                                        "<td class=\"text-center\">" + (index + 1) + "</td>" +
                                        "<td class=\"text-center\">" + tanggal(item.date_recorded) + "</td>" +
                                        "<td class=\"text-center\">";

                                        if (item.user) {
                                            invoice_val += item.user.name;
                                        } else {
                                            invoice_val += "User Tidak Ada";
                                        }

                                        invoice_val += "</td><td>";

                                        if (item.customer) {
                                            invoice_val += "<span class=\"text-primary\">" + item.customer.customer_name + "</span>";
                                        } else {
                                            invoice_val += "Customer Tidak Ada";
                                        }

                                    invoice_val += "</td>" +
                                        "<td class=\"text-center\">" + item.bid + "</td>" +
                                        "<td class=\"text-center\">" + item.code + "</td>" +
                                        "<td class=\"text-center\">" + format_rupiah(item.total_amount) + "</td>" +
                                    "</tr>";
                            });
                        invoice_val += "</tbody>" +
                    "</table>";

                    $('.card-body').append(invoice_val);

                    $('#table_one').DataTable({
                        'ordering': false
                    });
                }
            });
        }

        function invoiceSalesNotCustomer() {
            $('.card-body').empty();

            var formData = {
                opsi: $('#opsi').val(),
                start_date: $('#start_date').val(),
                end_date: $('#end_date').val(),
                _token: CSRF_TOKEN
            }

            $.ajax({
                url: '{{ URL::route('report.sales_not_customer') }}',
                type: 'POST',
                data: formData,
                success: function(response) {
                    var invoice_val = "" +
                    "<table id=\"table_one\" class=\"table table-bordered\">" +
                        "<thead style=\"background-color: #32a893;\">" +
                            "<tr>" +
                                "<th class=\"text-white text-center fw-bold\">No</th>" +
                                "<th class=\"text-white text-center fw-bold\">Tanggal</th>" +
                                "<th class=\"text-white text-center fw-bold\">Nama Kasir</th>" +
                                "<th class=\"text-white text-center fw-bold\">Nego</th>" +
                                "<th class=\"text-white text-center fw-bold\">Kode Nota</th>" +
                                "<th class=\"text-white text-center fw-bold\">Total</th>" +
                            "</tr>" +
                        "</thead>" +
                        "<tbody>";
                            $.each(response.invoices, function(index, item) {
                                invoice_val += "" +
                                    "<tr";
                                    if (index % 2 == 1) {
                                       invoice_val += " class=\"tabel_active\"";
                                    }
                                    invoice_val += ">" +
                                        "<td class=\"text-center\">" + (index + 1) + "</td>" +
                                        "<td class=\"text-center\">" + tanggal(item.date_recorded) + "</td>" +
                                        "<td class=\"text-center\">";

                                        if (item.user) {
                                            invoice_val += item.user.name;
                                        } else {
                                            invoice_val += "User Tidak Ada";
                                        }

                                    invoice_val += "</td>" +
                                        "<td class=\"text-center\">" + item.bid + "</td>" +
                                        "<td class=\"text-center\">" + item.code + "</td>" +
                                        "<td class=\"text-center\">" + format_rupiah(item.total_amount) + "</td>" +
                                    "</tr>";
                            });
                        invoice_val += "</tbody>" +
                    "</table>";

                    $('.card-body').append(invoice_val);

                    $('#table_one').DataTable({
                        'ordering': false
                    });
                }
            });
        }

        function invoiceSalesCustomer() {
            $('.card-body').empty();

            var formData = {
                opsi: $('#opsi').val(),
                start_date: $('#start_date').val(),
                end_date: $('#end_date').val(),
                _token: CSRF_TOKEN
            }

            $.ajax({
                url: '{{ URL::route('report.sales_customer') }}',
                type: 'POST',
                data: formData,
                success: function(response) {
                    var invoice_val = "" +
                    "<table id=\"table_one\" class=\"table table-bordered\">" +
                        "<thead style=\"background-color: #32a893;\">" +
                            "<tr>" +
                                "<th class=\"text-white text-center fw-bold\">No</th>" +
                                "<th class=\"text-white text-center fw-bold\">Tanggal</th>" +
                                "<th class=\"text-white text-center fw-bold\">Nama Kasir</th>" +
                                "<th class=\"text-white text-center fw-bold\">Customer</th>" +
                                "<th class=\"text-white text-center fw-bold\">Diskon</th>" +
                                "<th class=\"text-white text-center fw-bold\">Nego</th>" +
                                "<th class=\"text-white text-center fw-bold\">Kode Nota</th>" +
                                "<th class=\"text-white text-center fw-bold\">Total</th>" +
                            "</tr>" +
                        "</thead>" +
                        "<tbody>";
                            $.each(response.invoices, function(index, item) {
                                invoice_val += "" +
                                    "<tr";
                                    if (index % 2 == 1) {
                                       invoice_val += " class=\"tabel_active\"";
                                    }
                                    invoice_val += ">" +
                                        "<td class=\"text-center\">" + (index + 1) + "</td>" +
                                        "<td class=\"text-center\">" + tanggal(item.date_recorded) + "</td>" +
                                        "<td class=\"text-center\">";

                                        if (item.user) {
                                            invoice_val += item.user.name;
                                        } else {
                                            invoice_val += "User Tidak Ada";
                                        }

                                        invoice_val += "</td><td>";

                                        if (item.customer) {
                                            invoice_val += item.customer.customer_name;
                                        } else {
                                            invoice_val += "Customer Tidak Ada";
                                        }

                                    invoice_val += "</td>" +
                                        "<td class=\"text-center\">" + item.discount + "</td>" +
                                        "<td class=\"text-center\">" + item.bid + "</td>" +
                                        "<td class=\"text-center\">" + item.code + "</td>" +
                                        "<td class=\"text-center\">" + format_rupiah(item.total_amount) + "</td>" +
                                    "</tr>";
                            });
                        invoice_val += "</tbody>" +
                    "</table>";

                    $('.card-body').append(invoice_val);

                    $('#table_one').DataTable({
                        'ordering': false
                    });
                }
            });
        }

        $('.btn-search').on('click', function() {
            if ($('#start_date').val() == "" || $('#end_date').val() == "") {
                alert('Tanggal harus diisi!');
            } else {
                if ($('#opsi').val() == 1) {
                    invoiceSalesAll();
                }
                else if ($('#opsi').val() == 2) {
                    invoiceSalesNotCustomer();
                }
                else if ($('#opsi').val() == 3) {
                    invoiceSalesCustomer();
                }
                else {
                    invoiceSalesAll();
                }
            }
        });
    } );
</script>
@endsection
