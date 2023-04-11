@extends('backend.app')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="row py-2">
        <div class="col-sm-6">
            <h4 class="my-2"> {{ $title = 'Stock Search' }} </h3>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('stocks.create') }}"> <i
                            class="bi bi-file-earmark-plus"></i>Create</a></li>
            </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
    <div class="row justify-content-center my-2">
        <form action="{{ route('stocks.search') }}" method="get">
            <div class="row">
                <div class="col-sm-2">
                    <x-stock-select-input />
                </div>
                <div class="col-md-2">
                    <label class="form-label">Symbol</label>
                    <select class="form-select" name="symbol">
                        <option value="BTCUSDT" {{ $_GET['symbol'] == 'BTCUSDT' ? 'selected' : '' }}>BTCUSDT</option>
                        <option value="LTCBTC" {{ $_GET['symbol'] == 'LTCBTC' ? 'selected' : '' }}>LTCBTC</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <label class="form-label">Intraval</label>
                    <select class="form-select " name="interval">
                        <option value="1s" {{ $_GET['interval'] == '1s' ? 'selected' : '' }}>1S</option>
                        <option value="1m" {{ $_GET['interval'] == '1m' ? 'selected' : '' }}>1M</option>
                        <option value="1d" {{ $_GET['interval'] == '1d' ? 'selected' : '' }}>1D</option>
                    </select>
                </div>
                <div class="col-md-2 mt-4 pt-2">
                    <button type="submit" class="btn btn-primary">Search</button>
                </div>
            </div>
        </form>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div id="tvchart"></div>
        </div>
    </div>
    @push('scripts')
        <script src="{{ asset('lightweightCharts/tv.js') }}"></script>
        <script>
            const symbol = "{{ $symbol }}";
            const interval = "{{ $interval }}";
            const stock_id = "{{ $stock->id }}";
            const {
                log,
                error
            } = console;
            const getData = async () => {
                const resp = await fetch(`http://localhost:3000/api/stock/${stock_id}/${symbol}/${interval}`);
                const data = await resp.json();
                return data;

            }
            // getData();

            const renderChart = async () => {
                const chartProperties = {
                    width: 1000,
                    height: 600,
                    timeScale: {
                        timeVisible: true,
                        secodsVisible: true,
                    },
                    pane: 0,
                };
                const domElement = document.getElementById('tvchart');
                const chart = LightweightCharts.createChart(domElement, chartProperties);
                const candleSeries = chart.addCandlestickSeries();
                const klinedata = await getData();
                candleSeries.setData(klinedata);

                if ("{{ $stock->sma_enable }}" == true) {
                    //sma
                    const sma_series = chart.addLineSeries({
                        color: "{{ $stock->sma_color }}",
                        lineWidth: 1
                    });
                    const sma_data = klinedata
                        .filter((d) => d.sma)
                        .map((d) => ({
                            time: d.time,
                            value: d.sma
                        }));
                    sma_series.setData(sma_data);
                }
                //ema
                if ("{{ $stock->ema_enable }}" == true) {
                    const ema_series = chart.addLineSeries({
                        color: "{{ $stock->ema_color }}",
                        lineWidth: 1
                    });
                    const ema_data = klinedata
                        .filter((d) => d.ema)
                        .map((d) => ({
                            time: d.time,
                            value: d.ema
                        }));
                    ema_series.setData(ema_data);
                }
                //MARKERS
                candleSeries.setMarkers(
                    klinedata
                    .filter((d) => d.long || d.short)
                    .map((d) =>
                        d.long ? {
                            time: d.time,
                            position: 'belowBar',
                            color: 'green',
                            shape: 'arrowUp',
                            text: 'LONG',
                        } : {
                            time: d.time,
                            position: 'aboveBar',
                            color: 'red',
                            shape: 'arrowDown',
                            text: 'SHORT',
                        }
                    )
                );
                //RSI
                if ("{{ $stock->rsi_enable }}" == true) {
                    const rsi_series = chart.addLineSeries({
                        color: "{{ $stock->rsi_color }}",
                        lineWidth: 1,
                        pane: 1,
                    });
                    const rsi_data = klinedata
                        .filter((d) => d.rsi)
                        .map((d) => ({
                            time: d.time,
                            value: d.rsi
                        }));
                    rsi_series.setData(rsi_data);
                }
                //macd
                if ("{{ $stock->macd_enable }}" == true) {
                    //MACD FAST
                    const macd_fast_series = chart.addLineSeries({
                        color: "{{ $stock->macd_fast_line_color }}",
                        lineWidth: 1,
                        pane: 2,
                    });
                    const macd_fast_data = klinedata
                        .filter((d) => d.macd_fast)
                        .map((d) => ({
                            time: d.time,
                            value: d.macd_fast
                        }));
                    macd_fast_series.setData(macd_fast_data);

                    //MACD SLOW
                    const macd_slow_series = chart.addLineSeries({
                        color: "{{ $stock->macd_slow_line_color }}",
                        lineWidth: 1,
                        pane: 2,
                    });
                    const macd_slow_data = klinedata
                        .filter((d) => d.macd_slow)
                        .map((d) => ({
                            time: d.time,
                            value: d.macd_slow
                        }));
                    macd_slow_series.setData(macd_slow_data);

                    //MACD HISTOGRAM
                    const macd_histogram_series = chart.addHistogramSeries({
                        pane: 2,
                    });
                    const macd_histogram_data = klinedata
                        .filter((d) => d.macd_histogram)
                        .map((d) => ({
                            time: d.time,
                            value: d.macd_histogram,
                            color: d.macd_histogram > 0 ? "{{ $stock->macd_histogram_up_color }}" :
                                "{{ $stock->histogram_down_color }}",
                        }));
                    macd_histogram_series.setData(macd_histogram_data);
                }
            }
            renderChart();
        </script>
    @endpush
@endsection
