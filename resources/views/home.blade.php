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
        <div class="col-lg-6 col-md-6 px-4">
            <div class="card mb-4 border border-0">
                <div class="card-body text-center mb-5">
                    <img src="{{ asset('assets/img_home.png') }}" alt="img_home" style="max-width: 80%">
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
    });
</script>
@endsection
