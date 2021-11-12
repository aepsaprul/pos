@extends('layouts.app')

@section('style')
<link href="{{ asset('lib/datatables/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet">

<style>
    .col-md-11,
    .col-md-11 button,
    .col-md-11 a {
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
        <div class="col-md-11">
            <div class="row mb-3">
                <div class="col">
                    <span><a href="{{ route('home') }}" class="text-decoration-none">Home</a></span> /
                    <span><a href="{{ route('user.index') }}" class="text-decoration-none">User</a></span> /
                    <span>Hak Akses</span>
                </div>
            </div>
            <form action="{{ route('user.akses_simpan', [$user->id]) }}" method="POST">
                @method('PUT')
                @csrf
                <div class="card">
                    <div class="card-header">
                        <span class="text-uppercase">Akses Menu {{ $user->name }}</span>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead style="background-color: #32a893;">
                                <tr>
                                    <th class="text-light text-center">Menu Utama</th>
                                    <th class="text-light text-center">Menu Sub</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($nav_mains as $nav_main)
                                @if ($nav_main->navSub->isEmpty())
                                    <tr>
                                        <td>
                                            <div class="form-check">
                                                <input
                                                    class="form-check-input"
                                                    type="checkbox"
                                                    name="nav_main[]"
                                                    data-id="{{ $nav_main->id }}"
                                                    id="nav_main_{{ $nav_main->id }}"
                                                    value="{{ $nav_main->id }}"
                                                    @foreach ($nav_main_users as $nav_main_user)
                                                        @if ($nav_main_user->nav_main_id == $nav_main->id)
                                                            checked
                                                        @endif
                                                    @endforeach
                                                    >
                                                <label class="form-check-label" for="menu_utama_{{ $nav_main->id }}">
                                                    {{ $nav_main->title }}
                                                </label>
                                            </div>
                                        </td>
                                        <td></td>
                                    </tr>
                                @else
                                    <tr>
                                        <td>
                                            <div class="form-check">
                                                <input
                                                    class="form-check-input"
                                                    type="checkbox"
                                                    name="nav_main[]"
                                                    data-id="{{ $nav_main->id }}"
                                                    id="nav_main_{{ $nav_main->id }}"
                                                    value="{{ $nav_main->id }}"
                                                    @foreach ($nav_main_users as $nav_main_user)
                                                        @if ($nav_main_user->nav_main_id == $nav_main->id)
                                                            checked
                                                        @endif
                                                    @endforeach
                                                    >
                                                <label class="form-check-label" for="nav_main_{{ $nav_main->id }}">
                                                    {{ $nav_main->title }}
                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <ul class="list-group">
                                                @foreach ($nav_main->navSub as $nav_sub)
                                                    <li class="list-group">
                                                        <div class="form-check">
                                                            <input
                                                                class="form-check-input"
                                                                type="checkbox"
                                                                name="nav_sub[]"
                                                                data-main="{{ $nav_sub->nav_main_id }}"
                                                                id="nav_sub_{{ $nav_sub->id }}"
                                                                value="{{ $nav_sub->id }}"
                                                                @foreach ($nav_sub_users as $nav_sub_user)
                                                                    @if ($nav_sub_user->nav_sub_id == $nav_sub->id)
                                                                        checked
                                                                    @endif
                                                                @endforeach
                                                                >
                                                            <label class="form-check-label" for="nav_sub_{{ $nav_sub->id }}">
                                                                {{ $nav_sub->title }}
                                                            </label>
                                                        </div>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer">
                        <div class="col-md-3">
                            <button type="submit" class="btn btn-primary btn_cari btn-sm" style="width: 100px;">Submit</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    $(document).ready(function() {
        // $('input[name="nav_sub[]"]').prop('disabled', true);

        $('input[name="nav_main[]"]').on('change', function() {
            var id = $(this).attr('data-id');
            if ($('#nav_main_' + id).is(":checked")) {
                $('input[data-main="'+ id +'"]').prop('disabled', false);
            } else {
                $('input[data-main="'+ id +'"]').prop('disabled', true);
            }
        });
    });
</script>
@endsection
