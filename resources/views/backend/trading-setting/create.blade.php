@extends('backend.app')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="row">
        <div class="col-sm-6">
            <h4 class="my-2"> {{ $title = 'Trading Setting Create' }} </h3>
        </div><!-- /.col -->
    </div><!-- /.row -->

    <div class="row justify-content-center">
        <div class="col-md-3 ">
            <x-trading-setting-form />
        </div>
        <div class="col-md-9">
            <!-- TradingView Widget BEGIN -->
            <div class="tradingview-widget-container">
                <div id="tradingview_245cf"></div>
                @push('scripts')
                    <script type="text/javascript">
                        new TradingView.widget({
                            "width": 900,
                            "height": 600,
                            "symbol": "NASDAQ:AAPL",
                            "timezone": "Etc/UTC",
                            "theme": "light",
                            "style": "1",
                            "locale": "en",
                            "toolbar_bg": "#f1f3f6",
                            "enable_publishing": false,
                            "withdateranges": true,
                            "range": "YTD",
                            "hide_side_toolbar": false,
                            "allow_symbol_change": true,
                            "save_image": false,
                            "details": true,
                            "hotlist": true,
                            "calendar": true,
                            "container_id": "tradingview_245cf"
                        });
                    </script>
                @endpush
            </div>
            <!-- TradingView Widget END -->
        </div>
    </div>
@endsection
