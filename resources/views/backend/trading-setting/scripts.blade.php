@push('scripts')
    <script type="text/javascript">
        new TradingView.widget({
            "width": {{ $tradingSetting->width ?? '900' }},
            "height": {{ $tradingSetting->height ?? '900' }},
            "symbol": "NASDAQ:AAPL",
            "interval": "{{ $tradingSetting->interval ?? "1" }}",
            "timezone": "{{ $tradingSetting->timezone ?? 'Asia/Kathmandu' }}",
            "theme": "{{ $tradingSetting->theme ?? 'light' }}",
            "style": "{{ $tradingSetting->style ?? '1' }}",
            "locale": "{{ $tradingSetting->locale ?? 'en' }}",
            "toolbar_bg": "#f1f3f6",
            "studies": [
                @foreach ($tradingSetting->indicatorSettings as $indicatorSetting)
                    "{{ $indicatorSetting->value }}",
                @endforeach
            ],
            "enable_publishing": {{ $tradingSetting->enable_publishing == true ? 'true' : 'false' }},
            "withdateranges": {{ $tradingSetting->withdateranges == true ? 'true' : 'false' }},
            "range": "{{ $tradingSetting->range ?? '1D' }}",
            "hide_top_toolbar": {{ $tradingSetting->hide_top_toolbar == true ? 'false' : 'true' }},
            "hide_side_toolbar": {{ $tradingSetting->hide_side_toolbar == true ? 'false' : 'true' }},
            "allow_symbol_change": {{ $tradingSetting->allow_symbol_change == true ? 'true' : 'false' }},
            "save_image": {{ $tradingSetting->save_image == true ? 'true' : 'false' }},
            "details": {{ $tradingSetting->details == true ? 'true' : 'false' }},
            "hotlist": {{ $tradingSetting->hotlist == true ? 'true' : 'false' }},
            "calendar": {{ $tradingSetting->calendar == true ? 'true' : 'false' }},
            "container_id": "tradingview_{{ $tradingSetting->id ?? '00' }}"

        });
    </script>
@endpush
