@extends('layouts.app')
@section('content')
    <!-- Content Header (tradingSetting header) -->
    <div class="row py-2">
        <h3 class=" text-center"> {{ $title = 'Trading' }} </h3>
    </div><!-- /.row -->
    <div class="row">
        <!-- Left col -->
        <section class="col-lg-12 connectedSortable">
            <div class="tradingview-widget-container table-responsive">
                <div id="tradingview_{{ $tradingSetting->id ?? '00' }}"></div>
            </div>
        </section>
    </div>
    @include('backend.trading-setting.scripts')
@endsection
