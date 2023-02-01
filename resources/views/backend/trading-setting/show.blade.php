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
    @push('scripts')
        <script type="text/javascript">
            new TradingView.widget({
                "width": {{ $tradingSetting->width ?? '900' }},
                "height": {{ $tradingSetting->height ?? '900' }},
                "symbol": "NASDAQ:AAPL",
                "timezone": "{{ $tradingSetting->timezone ?? 'Asia/Kathmandu' }}",
                "theme": "{{ $tradingSetting->theme ?? 'light' }}",
                "style": "{{ $tradingSetting->style ?? '1' }}",
                "locale": "{{ $tradingSetting->locale ?? 'en' }}",
                "toolbar_bg": "#f1f3f6",
                "studies": [
                        @foreach ($tradingSetting->indicatorSettings as $indicatorSetting)
                         "{{$indicatorSetting->value}}",
                        @endforeach
                    ],
                "enable_publishing": {{ $tradingSetting->enable_publishing == true ? 'true' : 'false' }},
                "withdateranges": {{ $tradingSetting->withdateranges == true ? 'true' : 'false' }},
                "range": "{{ $tradingSetting->range ?? 'YTD' }}",
                "hide_top_toolbar": {{ $tradingSetting->hide_top_toolbar == true ? 'true' : 'false' }},
                "hide_side_toolbar": {{ $tradingSetting->hide_side_toolbar == true ? 'true' : 'false' }},
                "allow_symbol_change": {{ $tradingSetting->allow_symbol_change == true ? 'true' : 'false' }},
                "save_image": {{ $tradingSetting->save_image == true ? 'true' : 'false' }},
                "details": {{ $tradingSetting->details == true ? 'true' : 'false' }},
                "hotlist": {{ $tradingSetting->hotlist == true ? 'true' : 'false' }},
                "calendar": {{ $tradingSetting->calendar == true ? 'true' : 'false' }},
                "container_id": "tradingview_{{ $tradingSetting->id ?? '00' }}"
            });
        </script>
    @endpush
@endsection
