@extends('layouts.app')

@section('style')
<link href="{{ asset('lib/datatables/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet">

<style>
    .col-md-12,
    .col-md-12 button,
    .col-md-12 a {
        font-size: 12px;
    }
    .fas {
        font-size: 12px;
    }
</style>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h6 class="text-uppercase text-center">Data Karyawan</h6>

            <div class="row mb-2 mt-1">
                <div class="col-md-4">
                    <button
                        id="button-create"
                        type="button"
                        class="btn"
                        title="Tambah">
                            <i
                                class="fas fa-plus border border-0 py-2 me-2 text-white"
                                style="background-color: #32a893; margin-left: -10px; padding-right: 10px; padding-left: 10px;">
                            </i> Tambah
                    </button>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <table id="table_one" class="table table-bordered">
                        <thead style="background-color: #32a893;">
                            <tr>
                                <th class="text-white text-center fw-bold">No</th>
                                <th class="text-white text-center fw-bold">Nama</th>
                                <th class="text-white text-center fw-bold">Email</th>
                                <th class="text-white text-center fw-bold">Telepon</th>
                                <th class="text-white text-center fw-bold">Kantor</th>
                                <th class="text-white text-center fw-bold">Jabatan</th>
                                <th class="text-white text-center fw-bold">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($employees as $key => $item)
                                <tr
                                    @if ($key % 2 == 1)
                                        echo class="tabel_active";
                                    @endif
                                >
                                    <td class="text-center">{{ $key + 1 }}</td>
                                    <td><span class="full_name_{{ $item->id }}">{{ $item->full_name }}</span></td>
                                    <td><span class="email_{{ $item->id }}">{{ $item->email }}</span></td>
                                    <td><span class="contact_{{ $item->id }}">{{ $item->contact }}</span></td>
                                    <td>
                                        <span class="shop_{{ $item->id }}">
                                            @if ($item->shop)
                                                {{ $item->shop->name }}
                                            @else
                                                Kantor kosong
                                            @endif
                                        </span>
                                    </td>
                                    <td>
                                        <span class="position_{{ $item->id }}">
                                            @if ($item->position)
                                                {{ $item->position->name }}
                                            @else
                                                Jabatan kosong
                                            @endif
                                        </span>
                                    </td>
                                    <td class="text-center">
                                        <div class="btn-group">
                                            <button
                                                type="button"
                                                class="dropdown-toggle text-white border border-0 py-1"
                                                data-bs-toggle="dropdown"
                                                aria-expanded="false"
                                                style="background-color: #32a893;">
                                                    <i class="fas fa-cog"></i>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end">
                                                <li>
                                                    <button
                                                        class="dropdown-item btn-view border-bottom"
                                                        data-id="{{ $item->id }}"
                                                        type="button">
                                                            <i
                                                                class="fas fa-eye border border-1 px-2 py-2 me-2 text-white"
                                                                style="background-color: #32a893;">
                                                            </i> Lihat
                                                    </button>
                                                </li>
                                                <li>
                                                    <button
                                                        class="dropdown-item btn-edit border-bottom"
                                                        data-id="{{ $item->id }}"
                                                        type="button">
                                                            <i
                                                                class="fas fa-pencil-alt border border-1 px-2 py-2 me-2 text-white"
                                                                style="background-color: #32a893;">
                                                            </i> Ubah
                                                    </button>
                                                </li>
                                                <li>
                                                    <button
                                                        class="dropdown-item btn-delete"
                                                        data-id="{{ $item->id }}"
                                                        type="button">
                                                            <i
                                                                class="fas fa-trash-alt border border-1 px-2 py-2 me-2 text-white"
                                                                style="background-color: #32a893;">
                                                            </i> Hapus
                                                    </button>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="mb-5"></div>
    </div>
</div>

{{-- modal create  --}}
<div class="modal fade modal-create" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form id="form_create">
                <div class="modal-header" style="background-color: #32a893;">
                    <h5 class="modal-title text-white">Tambah Karyawan</h5>
                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close">
                    </button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="create_full_name" class="form-label">Nama Lengkap</label>
                        <input
                            type="text"
                            class="form-control form-control-sm"
                            id="create_full_name"
                            name="create_full_name"
                            maxlength="50" required>
                    </div>
                    <div class="mb-3">
                        <label for="create_nickname" class="form-label">Nama Panggilan</label>
                        <input
                            type="text"
                            class="form-control form-control-sm"
                            id="create_nickname"
                            name="create_nickname"
                            maxlength="30" required>
                    </div>
                    <div class="mb-3">
                        <label for="create_email" class="form-label">Email</label>
                        <input
                            type="email"
                            class="form-control form-control-sm"
                            id="create_email"
                            name="create_email"
                            maxlength="50" required>
                    </div>
                    <div class="mb-3">
                        <label for="create_contact" class="form-label">Telepon</label>
                        <input
                            type="text"
                            class="form-control form-control-sm"
                            id="create_contact"
                            name="create_contact"
                            maxlength="15" required>
                    </div>
                    <div class="mb-3">
                        <label for="create_address" class="form-label">Alamat</label>
                        <textarea class="form-control" name="create_address" id="create_address" rows="3" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="create_shop_id" class="form-label">Kantor</label>
                        <select name="create_shop_id" id="create_shop_id" class="form-control form-control-sm">

                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="create_position_id" class="form-label">Jabatan</label>
                        <select name="create_position_id" id="create_position_id" class="form-control form-control-sm">

                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="border-0 text-white" style="background-color: #32a893; padding: 5px 10px;">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- modal view  --}}
<div class="modal fade modal-view" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form id="form_view">

                {{-- id  --}}
                <input
                    type="hidden"
                    id="view_id"
                    name="view_id">

                <div class="modal-header" style="background-color: #32a893;">
                    <h5 class="modal-title text-white">Ubah Karyawan</h5>
                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close">
                    </button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="view_full_name" class="form-label">Nama Lengkap</label>
                        <input
                            type="text"
                            class="form-control form-control-sm"
                            id="view_full_name"
                            name="view_full_name"
                            maxlength="50"
                            readonly>
                    </div>
                    <div class="mb-3">
                        <label for="view_nickname" class="form-label">Nama Panggilan</label>
                        <input
                            type="text"
                            class="form-control form-control-sm"
                            id="view_nickname"
                            name="view_nickname"
                            maxlength="30"
                            readonly>
                    </div>
                    <div class="mb-3">
                        <label for="view_email" class="form-label">Email</label>
                        <input
                            type="email"
                            class="form-control form-control-sm"
                            id="view_email"
                            name="view_email"
                            maxlength="50"
                            readonly>
                    </div>
                    <div class="mb-3">
                        <label for="view_contact" class="form-label">Telepon</label>
                        <input
                            type="text"
                            class="form-control form-control-sm"
                            id="view_contact"
                            name="view_contact"
                            maxlength="15"
                            readonly>
                    </div>
                    <div class="mb-3">
                        <label for="view_address" class="form-label">Alamat</label>
                        <textarea class="form-control" name="view_address" id="view_address" rows="3" readonly></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="view_shop" class="form-label">Kantor</label>
                        <input
                            type="text"
                            class="form-control form-control-sm"
                            id="view_shop"
                            name="view_shop"
                            readonly>
                    </div>
                    <div class="mb-3">
                        <label for="view_position" class="form-label">Jabatan</label>
                        <input
                            type="text"
                            class="form-control form-control-sm"
                            id="view_position"
                            name="view_position"
                            readonly>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- modal edit  --}}
<div class="modal fade modal-edit" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form id="form_edit">

                {{-- id  --}}
                <input
                    type="hidden"
                    id="edit_id"
                    name="edit_id">

                <div class="modal-header" style="background-color: #32a893;">
                    <h5 class="modal-title text-white">Ubah Karyawan</h5>
                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close">
                    </button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="edit_full_name" class="form-label">Nama Lengkap</label>
                        <input
                            type="text"
                            class="form-control form-control-sm"
                            id="edit_full_name"
                            name="edit_full_name"
                            maxlength="50"
                            required>
                    </div>
                    <div class="mb-3">
                        <label for="edit_nickname" class="form-label">Nama Panggilan</label>
                        <input
                            type="text"
                            class="form-control form-control-sm"
                            id="edit_nickname"
                            name="edit_nickname"
                            maxlength="30"
                            required>
                    </div>
                    <div class="mb-3">
                        <label for="edit_email" class="form-label">Email</label>
                        <input
                            type="email"
                            class="form-control form-control-sm"
                            id="edit_email"
                            name="edit_email"
                            maxlength="50"
                            required>
                    </div>
                    <div class="mb-3">
                        <label for="edit_contact" class="form-label">Telepon</label>
                        <input
                            type="text"
                            class="form-control form-control-sm"
                            id="edit_contact"
                            name="edit_contact"
                            maxlength="15"
                            required>
                    </div>
                    <div class="mb-3">
                        <label for="edit_address" class="form-label">Alamat</label>
                        <textarea class="form-control" name="edit_address" id="edit_address" rows="3" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="edit_shop_id" class="form-label">Kantor</label>
                        <select name="edit_shop_id" id="edit_shop_id" class="form-control form-control-sm">

                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="edit_position_id" class="form-label">Jabatan</label>
                        <select name="edit_position_id" id="edit_position_id" class="form-control form-control-sm">

                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="border-0 text-white" style="background-color: #32a893; padding: 5px 10px;">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- modal delete  --}}
<div class="modal fade modal-delete" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form id="form_delete">

                {{-- id  --}}
                <input type="hidden" id="delete_id" name="delete_id">

                <div class="modal-header">
                    <h5 class="modal-title">Yakin akan dihapus <span class="delete_title text-decoration-underline"></span> ?</h5>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-secondary text-center" data-bs-dismiss="modal" style="width: 100px;">Tidak</button>
                    <button type="submit" class="btn btn-primary text-center" style="width: 100px;">Ya</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- modal proses berhasil  --}}
<div class="modal fade modal-proses" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                Proses sukses.... <i class="fas fa-check" style="color: #32a893;"></i>
            </div>
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

        $('#table_one').DataTable({
            'ordering': false
        });

        $('#button-create').on('click', function() {
            $('#create_shop_id').empty();
            $('#create_position_id').empty();

            $.ajax({
                url: '{{ URL::route('employee.create') }}',
                type: 'GET',
                success: function(response) {
                    var shop_value = "<option value=\"\">--Pilih Kantor--</option>";

                    $.each(response.shops, function(index, value) {
                        shop_value += "<option value=\"" + value.id + "\">" + value.name + "</option>";
                    });


                    var position_value = "<option value=\"\">--Pilih Jabatan--</option>";

                    $.each(response.positions, function(index, value) {
                        position_value += "<option value=\"" + value.id + "\">" + value.name + "</option>";
                    });

                    $('#create_shop_id').append(shop_value);
                    $('#create_position_id').append(position_value);
                    $('.modal-create').modal('show');
                }
            });
        });

        $(document).on('shown.bs.modal', '.modal-create', function() {
            $('#create_full_name').focus();
        });

        $('#form_create').submit(function(e) {
            e.preventDefault();

            $('.modal-create').modal('hide');

            var formData = {
                full_name: $('#create_full_name').val(),
                nickname: $('#create_nickname').val(),
                email: $('#create_email').val(),
                contact: $('#create_contact').val(),
                address: $('#create_address').val(),
                shop_id: $('#create_shop_id').val(),
                position_id: $('#create_position_id').val(),
                _token: CSRF_TOKEN
            }

            $.ajax({
                url: '{{ URL::route('employee.store') }} ',
                type: 'POST',
                data: formData,
                success: function(response) {
                    $('.modal-proses').modal('show');
                    setTimeout(() => {
                        window.location.reload(1);
                    }, 1000);
                }
            });
        });

        $('body').on('click', '.btn-view', function(e) {
            e.preventDefault();

            var id = $(this).attr('data-id');
            var url = '{{ route("employee.show", ":id") }}';
            url = url.replace(':id', id );

            var formData = {
                id: id,
                _token: CSRF_TOKEN
            }

            $.ajax({
                url: url,
                type: 'GET',
                data: formData,
                success: function(response) {
                    $('#view_id').val(response.id);
                    $('#view_full_name').val(response.full_name);
                    $('#view_nickname').val(response.nickname);
                    $('#view_email').val(response.email);
                    $('#view_contact').val(response.contact);
                    $('#view_address').val(response.address);
                    $('#view_shop').val(response.shop);
                    $('#view_position').val(response.position);

                    $('.modal-view').modal('show');
                }
            })
        });

        $('body').on('click', '.btn-edit', function(e) {
            e.preventDefault();
            $('#edit_shop_id').empty();
            $('#edit_position_id').empty();

            var id = $(this).attr('data-id');
            var url = '{{ route("employee.edit", ":id") }}';
            url = url.replace(':id', id );

            var formData = {
                id: id,
                _token: CSRF_TOKEN
            }

            $.ajax({
                url: url,
                type: 'GET',
                data: formData,
                success: function(response) {
                    $('#edit_id').val(response.id);
                    $('#edit_full_name').val(response.full_name);
                    $('#edit_nickname').val(response.nickname);
                    $('#edit_email').val(response.email);
                    $('#edit_contact').val(response.contact);
                    $('#edit_address').val(response.address);

                    // shop
                    var shop_value = "<option value=\"\">--Pilih Kantor--</option>";

                    $.each(response.shops, function(index, item) {
                        shop_value += "<option value=\"" + item.id + "\"";

                        if (item.id == response.shop_id) {
                            shop_value += "selected";
                        }

                        shop_value += ">" + item.name + "</option>";
                    });

                    // position
                    var position_value = "<option value=\"\">--Pilih Jabatan--</option>";

                    $.each(response.positions, function(index, item) {
                        position_value += "<option value=\"" + item.id + "\"";

                        if (item.id == response.position_id) {
                            position_value += "selected";
                        }

                        position_value += ">" + item.name + "</option>";
                    });

                    $('#edit_shop_id').append(shop_value);
                    $('#edit_position_id').append(position_value);
                    $('.modal-edit').modal('show');
                }
            })
        });

        $('#form_edit').submit(function(e) {
            e.preventDefault();

            $('.modal-edit').modal('hide');
            $('.full_name_' + $('#edit_id').val()).empty();
            $('.email_' + $('#edit_id').val()).empty();
            $('.contact_' + $('#edit_id').val()).empty();
            $('.shop_' + $('#edit_id').val()).empty();
            $('.position_' + $('#edit_id').val()).empty();

            var formData = {
                id: $('#edit_id').val(),
                full_name: $('#edit_full_name').val(),
                nickname: $('#edit_nickname').val(),
                email: $('#edit_email').val(),
                contact: $('#edit_contact').val(),
                address: $('#edit_address').val(),
                shop_id: $('#edit_shop_id').val(),
                position_id: $('#edit_position_id').val(),
                _token: CSRF_TOKEN
            }

            $.ajax({
                url: '{{ URL::route('employee.update') }}',
                type: 'POST',
                data: formData,
                success: function(response) {
                    $('.modal-proses').modal('show');

                    $('.full_name_' + response.id).append(response.full_name);
                    $('.email_' + response.id).append(response.email);
                    $('.contact_' + response.id).append(response.contact);
                    $('.shop_' + response.id).append(response.shop);
                    $('.position_' + response.id).append(response.position);

                    setTimeout(() => {
                        $('.modal-proses').modal('hide');
                    }, 1000);
                }
            });
        });

        $('body').on('click', '.btn-delete', function(e) {
            e.preventDefault()

            var id = $(this).attr('data-id');
            var url = '{{ route("employee.delete_btn", ":id") }}';
            url = url.replace(':id', id );

            var formData = {
                id: id,
                _token: CSRF_TOKEN
            }

            $.ajax({
                url: url,
                type: 'GET',
                data: formData,
                success: function(response) {
                    $('.delete_title').append(response.full_name);
                    $('#delete_id').val(response.id);
                    $('.modal-delete').modal('show');
                }
            });
        });

        $('#form_delete').submit(function(e) {
            e.preventDefault();

            $('.modal-delete').modal('hide');

            var formData = {
                id: $('#delete_id').val(),
                _token: CSRF_TOKEN
            }

            $.ajax({
                url: '{{ URL::route('employee.delete') }}',
                type: 'POST',
                data: formData,
                success: function(response) {
                    $('.modal-proses').modal('show');
                    setTimeout(() => {
                        window.location.reload(1);
                    }, 1000);
                }
            });
        });
    } );
</script>
@endsection
