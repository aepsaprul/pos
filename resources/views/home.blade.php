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
        <img src="{{ asset('assets/img_home.png') }}" alt="img_home" style="max-width: 35%">
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
