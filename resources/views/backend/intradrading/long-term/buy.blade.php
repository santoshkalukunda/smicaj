@extends('backend.app')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="row">
        <div class="col-sm-6">
            <h4 class="my-2"> {{ $title = 'Intradrading > Long Term > Buy Setting' }} </h3>
        </div><!-- /.col -->
    </div><!-- /.row -->

    <div class="row justify-content-center">
        <div class="col-md-12 ">
            <div class="fs-5 py-4 text-center">Buy Setting</div>
            <x-trading-setting-form/>
        </div>
    </div>
@endsection
