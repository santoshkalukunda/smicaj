@extends('backend.app')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="row py-2">
        <div class="col-sm-6">
            <h4 class="my-2">
                @if ($stock->id)
                    {{ $title = 'Setting Edit' }}
                @else
                    {{ $title = 'Setting Create' }}
                @endif
                </h3>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('stocks.index') }}"> <i class="bi bi-arrow-clockwise"></i> Go
                        Back</a></li>
            </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
    <form action="{{ $stock->id ? route('stocks.update', $stock) : route('stocks.store') }}" method="post">
        @if ($stock->id)
            @method('put')
        @endif
        @csrf

        <div class="row">
            <div class="col-md-3">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Setting Name</label>
                    <input type="text" class="form-control @error('name')  is-invalid @enderror" name="name"
                        aria-label="Default select example" value="{{ old('name', $stock->name) }}" required
                        placeholder="Setting Name">
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-3">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Trading</label>
                    <select class="form-select @error('trading')  is-invalid @enderror" name="trading"
                        aria-label="Default select example" required>
                        <option value="">Select Trading</option>
                        <option value="intraday_trading" {{ $stock->trading == 'intraday_trading' ? 'selected' : '' }}>
                            Intraday
                            Trading</option>
                        <option value="swing_trading" {{ $stock->trading == 'swing_trading' ? 'selected' : '' }}>Swing
                            Trading
                        </option>
                        <option value="long_term_trading" {{ $stock->trading == 'long_term_trading' ? 'selected' : '' }}>
                            Long Term
                            Trading</option>
                    </select>
                    @error('trading')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-2">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Trading Time</label>
                    <select class="form-select @error('trading_time')  is-invalid @enderror" name="trading_time"
                        aria-label="Default select example" required>
                        <option value="">Select trading time</option>
                        <option value="very_short_term" {{ $stock->trading_time == 'very_short_term' ? 'selected' : '' }}>
                            Very
                            Short Term</option>
                        <option value="short_term" {{ $stock->trading_time == 'short_term' ? 'selected' : '' }}>Short Term
                        </option>
                        <option value="long_term" {{ $stock->trading_time == 'long_term' ? 'selected' : '' }}>Long Term
                        </option>
                    </select>
                    @error('trading_time')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-2">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Buy/Sell</label>
                    <select class="form-select @error('buy_sell')  is-invalid @enderror" name="buy_sell"
                        aria-label="Default select example" required>
                        <option value="1" {{ $stock->buy_sell == 1 ? 'selected' : '' }}>Buy
                        </option>
                        <option value="0" {{ $stock->buy_sell == 0 ? 'selected' : '' }}>Sell
                        </option>
                    </select>
                    @error('buy_sell')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

            </div>

        </div>
        <div class="row">
            <div class="mb-3">
                <h5>MACD</h5>
            </div>
            <div class="col-md-2">
                <div class="mb-3">
                    <label for="lineWidth" class="form-label">Source</label>
                    <select class="form-select" name="macd_source" aria-label="Default select example">
                        <option value="close" {{ $stock->macd_source == 'close' ? 'selected' : '' }}>Close</option>
                        <option value="open" {{ $stock->macd_source == 'open' ? 'selected' : '' }}>Open</option>
                        <option value="high" {{ $stock->macd_source == 'high' ? 'selected' : '' }}>High</option>
                        <option value="low" {{ $stock->macd_source == 'low' ? 'selected' : '' }}>Low</option>
                    </select>
                </div>
            </div>
            <div class="col-md-2">
                <div class="mb-3">
                    <label for="fastLength" class="form-label">Fast Length</label>
                    <input type="number" name="macd_fast_length" value="{{ $stock->macd_fast_length ?? 9 }}"
                        class="form-control" id="fastLength">
                </div>
            </div>
            <div class="col-md-2">
                <div class="mb-3">
                    <label for="fastlineWidth" class="form-label">Fast Line
                        Width</label>
                    <input type="number" name="macd_fast_width" value="{{ $stock->macd_fast_width ?? 1 }}"
                        class="form-control" id="fastlineWidth">
                </div>
            </div>
            <div class="col-md-2">
                <div class="mb-3">
                    <label for="fastLineColor" class="form-label">Fast Line
                        Color</label>
                    <input type="color" class="form-control" name="macd_fast_line_color"
                        value="{{ $stock->macd_fast_line_color ?? '#031cfc' }}" id="fastLineColor">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-2">
                <div class="mb-3">
                    <label for="slowLength" class="form-label">Slow Length</label>
                    <input type="number" name="macd_slow_length" value="{{ $stock->macd_slow_length ?? 26 }}"
                        class="form-control" id="slowLength">
                </div>
            </div>
            <div class="col-md-2">
                <div class="mb-3">
                    <label for="slowlineWidth" class="form-label">Slow Line
                        Width</label>
                    <input type="number" name="macd_slow_width" value="{{ $stock->macd_slow_width ?? 1 }}"
                        class="form-control" id="slowlineWidth">
                </div>
            </div>
            <div class="col-md-2">
                <div class="mb-3">
                    <label for="slowLineColor" class="form-label">Slow Line
                        Color</label>
                    <input type="color" class="form-control" name="macd_slow_line_color"
                        value="{{ $stock->macd_slow_line_color ?? '#fc0303' }}" id="slowLineColor">
                </div>
            </div>
        </div>

        <div class="row">

            <div class="col-md-2">
                <div class="mb-3">
                    <label for="signalSmoothing" class="form-label">Histogram</label>
                    <input type="number" name="macd_histogram" value="9" class="form-control"
                        id="signalSmoothing">
                </div>
            </div>
            <div class="col-md-2">
                <div class="mb-3">
                    <label for="histogramUpColor" class="form-label">Histogram Up
                        Color</label>
                    <input type="color" class="form-control" name="macd_histogram_up_color"
                        value="{{ $stock->macd_histogram_up_color ?? '#0aad30' }}" id="histogramUpColor">
                </div>
            </div>
            <div class="col-md-2">
                <div class="mb-3">
                    <label for="histogramDownColor" class="form-label">Histogram Down
                        Color</label>
                    <input type="color" class="form-control" name="histogram_down_color"
                        value="{{ $stock->histogram_down_color ?? '#fc0303' }}" id="histogramDownColor">
                </div>
            </div>
            <div class="col-md-2">
                <div class="mb-3">
                    <label for="macdStatus" class="form-label">MACD Status</label>
                    <select class="form-select" name="macd_enable">
                        <option value="1" {{ $stock->macd_enable == 1 ? 'selected' : '' }}>Enable</option>
                        <option value="0" {{ $stock->macd_enable == 0 ? 'selected' : '' }}>Desable</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="row">
            <h5>RSI</h5>
            <div class="col-md-2">
                <div class="mb-3">
                    <label for="lineWidth" class="form-label">RSI source</label>
                    <select class="form-select" name="rsi_source" aria-label="Default select example">
                        <option value="close" {{ $stock->rsi_source == 'close' ? 'selected' : '' }}>Close</option>
                        <option value="open" {{ $stock->rsi_source == 'open' ? 'selected' : '' }}>Open</option>
                        <option value="high" {{ $stock->rsi_source == 'high' ? 'selected' : '' }}>High</option>
                        <option value="low" {{ $stock->rsi_source == 'low' ? 'selected' : '' }}>Low</option>
                    </select>
                </div>
            </div>
            <div class="col-md-2">
                <div class="mb-3">
                    <label for="lenght" class="form-label">RSI Length</label>
                    <input type="number" name="rsi_length" class="form-control" value="{{ $stock->rsi_length ?? 21 }}"
                        id="lenght">
                </div>
            </div>

            <div class="col-md-2">
                <div class="mb-3">
                    <label for="lineWidth" class="form-label">Line Width</label>
                    <input type="number" name="rsi_width" class="form-control"
                        value="{{ $stock->macd_slow_width ?? 1 }}" id="lineWidth">

                </div>
            </div>
            <div class="col-md-2">
                <div class="mb-3">
                    <label for="color" class="form-label">Color</label>
                    <input type="color" class="form-control" name="rsi_color"
                        value="{{ $stock->rsi_color ?? '#2196f3' }}" id="color">
                </div>
            </div>
            <div class="col-md-2">
                <div class="mb-3">
                    <label for="macdStatus" class="form-label">RSI Status</label>
                    <select class="form-select" name="rsi_enable">
                        <option value="1" {{ $stock->rsi_enable == 1 ? 'selected' : '' }}>Enable</option>
                        <option value="0" {{ $stock->rsi_enable == 0 ? 'selected' : '' }}>Desable</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <h5>EMA</h5>
            <div class="col-md-2">
                <div class="mb-3">
                    <label for="lineWidth" class="form-label">EMA source</label>
                    <select class="form-select" name="ema_source" aria-label="Default select example">
                        <option value="close" {{ $stock->ema_source == 'close' ? 'selected' : '' }}>Close</option>
                        <option value="open" {{ $stock->ema_source == 'open' ? 'selected' : '' }}>Open</option>
                        <option value="high" {{ $stock->ema_source == 'high' ? 'selected' : '' }}>High</option>
                        <option value="low" {{ $stock->ema_source == 'low' ? 'selected' : '' }}>Low</option>

                    </select>
                </div>
            </div>
            <div class="col-md-2">
                <div class="mb-3">
                    <label for="lenght" class="form-label">EMA Length</label>
                    <input type="number" name="ema_length" class="form-control" value="{{ $stock->ema_length ?? 50 }}"
                        id="lenght">
                </div>
            </div>

            <div class="col-md-2">
                <div class="mb-3">
                    <label for="lineWidth" class="form-label">Line Width</label>
                    <input type="number" name="ema_width" class="form-control" value="{{ $stock->ema_width ?? 1 }}"
                        id="lineWidth">

                </div>
            </div>
            <div class="col-md-2">
                <div class="mb-3">
                    <label for="color" class="form-label">Color</label>
                    <input type="color" class="form-control" name="ema_color"
                        value="{{ $stock->ema_color ?? '#0aad30' }}" id="color">
                </div>
            </div>
            <div class="col-md-2">
                <div class="mb-3">
                    <label for="macdStatus" class="form-label">EMA Status</label>
                    <select class="form-select" name="ema_enable">
                        <option value="1" {{ $stock->ema_enable == 1 ? 'selected' : '' }}>Enable</option>
                        <option value="0" {{ $stock->ema_enable == 0 ? 'selected' : '' }}>Desable</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="row">
            <h5>SMA</h5>
            <div class="col-md-2">
                <div class="mb-3">
                    <label for="sma source" class="form-label">SMA source</label>
                    <select class="form-select" name="sma_source" aria-label="Default select example">
                        <option value="close" {{ $stock->sma_source == 'close' ? 'selected' : '' }}>Close</option>
                        <option value="open" {{ $stock->sma_source == 'open' ? 'selected' : '' }}>Open</option>
                        <option value="high" {{ $stock->sma_source == 'high' ? 'selected' : '' }}>High</option>
                        <option value="low" {{ $stock->sma_source == 'low' ? 'selected' : '' }}>Low</option>
                    </select>
                </div>
            </div>
            <div class="col-md-2">
                <div class="mb-3">
                    <label for="lenght" class="form-label">SMA Length</label>
                    <input type="number" name="sma_length" class="form-control" value="{{ $stock->sma_length ?? 10 }}"
                        id="lenght">
                </div>
            </div>
            <div class="col-md-2">
                <div class="mb-3">
                    <label for="lineWidth" class="form-label">Line Width</label>
                    <input type="number" name="sma_width" class="form-control" value="{{ $stock->sma_width ?? 1 }}"
                        id="lineWidth">
                </div>
            </div>
            <div class="col-md-2">
                <div class="mb-3">
                    <label for="color" class="form-label">Color</label>
                    <input type="color" class="form-control" name="sma_color"
                        value="{{ $stock->sma_color ?? '#fc0303' }}" id="color">
                </div>
            </div>
            <div class="col-md-2">
                <div class="mb-3">
                    <label for="macdStatus" class="form-label">SMA Status</label>
                    <select class="form-select" name="sma_enable">
                        <option value="1" {{ $stock->sma_enable == 1 ? 'selected' : '' }}>Enable</option>
                        <option value="0" {{ $stock->sma_enable == 0 ? 'selected' : '' }}>Desable</option>
                    </select>
                </div>
            </div>
            <div class="col-md-10">
                <button type="submit" class="btn btn-primary form-control">{{ $stock->id ? 'Update' : 'Save' }}</button>
            </div>
        </div>
    </form>
@endsection
