@extends('layouts.app')
@section('content')
    <!-- Content Header (tradingSetting header) -->
    @php
    if($tradingSetting->trading == "intraday_trading"){
        $trading = "Intraday Trading";
    }elseif ($tradingSetting->trading == "swing_trading") {
        $trading = "Swing Trading";  
    }else{
        $trading = "Long Term Trading";  
    }
    if($tradingSetting->trading_time == "very_short_term"){
        $trading_time = "Very Short term";
    }elseif ($tradingSetting->trading_time == "short_term") {
        $trading_time = "Short Term";  
    }else{
        $trading_time = "Long Term";  
    }
    if($tradingSetting->trading_time == true){
        $buy_sell = "Buy";
    }else{
        $buy_sell = "Sell";  
    }

    @endphp
    <div class="row py-2">
        <h3 class=" text-center"> {{ $title = $trading ." In ". $trading_time ." For " . $buy_sell ." (".$tradingSetting->name .")" }} </h3>
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
