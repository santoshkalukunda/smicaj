@extends('backend.app')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="row py-2">
        <div class="col-sm-6">
            <h4 class="my-2"> {{ $title = $tradingSetting->id ? 'Trading Setting Edit' : 'Trading Setting Create' }} </h3>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('trading-settings.index')}}"> <i class="bi bi-arrow-clockwise"></i> Go Back</a></li>
            </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="bg-white p-2">
                <form
                    action="{{ $tradingSetting->id ? route('trading-settings.update', $tradingSetting) : route('trading-settings.store') }}"
                    method="post">
                    @if ($tradingSetting->id)
                        @method('put')
                    @endif

                    @csrf
                    <div class="row">
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Trading</label>
                                <select class="form-select @error('trading')  is-invalid @enderror" name="trading"
                                    aria-label="Default select example" required>
                                    <option value="">Select Trading</option>
                                    <option value="intraday_trading"
                                        {{ $tradingSetting->trading == 'intraday_trading' ? 'selected' : '' }}>Intraday
                                        Trading</option>
                                    <option value="swing_trading"
                                        {{ $tradingSetting->trading == 'swing_trading' ? 'selected' : '' }}>Swing Trading
                                    </option>
                                    <option value="long_term_trading"
                                        {{ $tradingSetting->trading == 'long_term_trading' ? 'selected' : '' }}>Long Term
                                        Trading</option>
                                </select>
                                @error('trading')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Trading Time</label>
                                <select class="form-select @error('trading_time')  is-invalid @enderror" name="trading_time"
                                    aria-label="Default select example" required>
                                    <option value="">Select trading time</option>
                                    <option value="very_short_term"
                                        {{ $tradingSetting->trading_time == 'very_short_term' ? 'selected' : '' }}>Very
                                        Short Term</option>
                                    <option value="Short_term"
                                        {{ $tradingSetting->trading_time == 'Short_term' ? 'selected' : '' }}>Short Term
                                    </option>
                                    <option value="long_term"
                                        {{ $tradingSetting->trading_time == 'long_term' ? 'selected' : '' }}>Long Term
                                    </option>
                                </select>
                                @error('trading_time')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Buy/Sell</label>
                                <select class="form-select @error('buy_sell')  is-invalid @enderror" name="buy_sell"
                                    aria-label="Default select example" required>
                                    <option value="1" {{ $tradingSetting->buy_sell == true ? 'selected' : '' }}>Buy
                                    </option>
                                    <option value="0" {{ $tradingSetting->buy_sell == false ? 'selected' : '' }}>Sell
                                    </option>
                                </select>
                                @error('buy_sell')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Default Interval</label>
                                <select class="form-select @error('interval')  is-invalid @enderror" name="interval"
                                    aria-label="Default select example" required>
                                    <option value="1" {{ $tradingSetting->interval == '1' ? 'selected' : '' }}>1
                                        minute</option>
                                    <option value="3" {{ $tradingSetting->interval == '3' ? 'selected' : '' }}>3
                                        minutes</option>
                                    <option value="5" {{ $tradingSetting->interval == '5' ? 'selected' : '' }}>5
                                        minutes</option>
                                    <option value="15" {{ $tradingSetting->interval == '15' ? 'selected' : '' }}>15
                                        minutes</option>
                                    <option value="30" {{ $tradingSetting->interval == '30' ? 'selected' : '' }}>30
                                        minutes</option>
                                    <option value="45" {{ $tradingSetting->interval == '45' ? 'selected' : '' }}>45
                                        minutes</option>
                                    <option value="60" {{ $tradingSetting->interval == '60' ? 'selected' : '' }}>1 hour
                                    </option>
                                    <option value="120" {{ $tradingSetting->interval == '120' ? 'selected' : '' }}>2 hour
                                    </option>
                                    <option value="180" {{ $tradingSetting->interval == '180' ? 'selected' : '' }}>3 hour
                                    </option>
                                    <option value="240" {{ $tradingSetting->interval == '240' ? 'selected' : '' }}>4 hour
                                    </option>
                                    <option value="D" {{ $tradingSetting->interval == 'D' ? 'selected' : '' }}>1 Day
                                    </option>
                                </select>
                                @error('interval')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Indicators</label>
                                <select id="multi-select" name="studies[]"
                                    class="form-select  @error('studies')  is-invalid @enderror"
                                    aria-placeholder="Add indicators" multiple required>
                                    @if ($tradingSetting->id)
                                        @foreach ($tradingSetting->indicatorSettings as $indicatorSetting)
                                            <option value="ACCD@tv-basicstudies"
                                                {{ $indicatorSetting->value == 'ACCD@tv-basicstudies' ? 'selected' : '' }}
                                                attr-short-desc="Accum/Dist">
                                                Accumulation/Distribution
                                            </option>
                                            <option value="studyADR@tv-basicstudies"
                                                {{ $indicatorSetting->value == 'studyADR@tv-basicstudies' ? 'selected' : '' }}
                                                attr-short-desc="ADR">ADR</option>
                                            <option value="AROON@tv-basicstudies"
                                                {{ $indicatorSetting->value == 'AROON@tv-basicstudies' ? 'selected' : '' }}
                                                attr-short-desc="Aroon">Aroon</option>
                                            <option value="ATR@tv-basicstudies"
                                                {{ $indicatorSetting->value == 'ATR@tv-basicstudies' ? 'selected' : '' }}
                                                attr-short-desc="ATR">Average True Range
                                            </option>
                                            <option value="AwesomeOscillator@tv-basicstudies"
                                                {{ $indicatorSetting->value == 'AwesomeOscillator@tv-basicstudies' ? 'selected' : '' }}
                                                attr-short-desc="AO">Awesome
                                                Oscillator
                                            </option>
                                            <option value="BB@tv-basicstudies"
                                                {{ $indicatorSetting->value == 'BB@tv-basicstudies' ? 'selected' : '' }}
                                                attr-short-desc="BB">Bollinger Bands</option>
                                            <option value="BollingerBandsR@tv-basicstudies"
                                                {{ $indicatorSetting->value == 'BollingerBandsR@tv-basicstudies' ? 'selected' : '' }}
                                                attr-short-desc="BB %B">
                                                Bollinger Bands
                                                %B
                                            </option>
                                            <option value="BollingerBandsWidth@tv-basicstudies"
                                                {{ $indicatorSetting->value == 'BollingerBandsWidth@tv-basicstudies' ? 'selected' : '' }}
                                                attr-short-desc="BBW">
                                                Bollinger
                                                Bands
                                                Width</option>
                                            <option value="CMF@tv-basicstudies"
                                                {{ $indicatorSetting->value == 'CMF@tv-basicstudies' ? 'selected' : '' }}
                                                attr-short-desc="CMF">Chaikin Money Flow
                                            </option>
                                            <option value="ChaikinOscillator@tv-basicstudies"
                                                {{ $indicatorSetting->value == 'ChaikinOscillator@tv-basicstudies' ? 'selected' : '' }}
                                                attr-short-desc="Chaikin Osc">
                                                Chaikin
                                                Oscillator</option>
                                            <option value="chandeMO@tv-basicstudies"
                                                {{ $indicatorSetting->value == 'chandeMO@tv-basicstudies' ? 'selected' : '' }}
                                                attr-short-desc="ChandeMO">Chande
                                                Momentum
                                                Oscillator
                                            </option>
                                            <option value="ChoppinessIndex@tv-basicstudies"
                                                {{ $indicatorSetting->value == 'ChoppinessIndex@tv-basicstudies' ? 'selected' : '' }}
                                                attr-short-desc="CHOP">
                                                Choppiness Index
                                            </option>
                                            <option value="CCI@tv-basicstudies"
                                                {{ $indicatorSetting->value == 'CCI@tv-basicstudies' ? 'selected' : '' }}
                                                attr-short-desc="CCI">Commodity Channel
                                                Index
                                            </option>
                                            <option value="CRSI@tv-basicstudies"
                                                {{ $indicatorSetting->value == 'CRSI@tv-basicstudies' ? 'selected' : '' }}
                                                attr-short-desc="CRSI">ConnorsRSI</option>
                                            <option value="CorrelationCoefficient@tv-basicstudies"
                                                {{ $indicatorSetting->value == 'CorrelationCoefficient@tv-basicstudies' ? 'selected' : '' }}
                                                attr-short-desc="CC">
                                                Correlation
                                                Coefficient</option>
                                            <option value="DetrendedPriceOscillator@tv-basicstudies"
                                                {{ $indicatorSetting->value == 'DetrendedPriceOscillator@tv-basicstudies' ? 'selected' : '' }}
                                                attr-short-desc="DPO">
                                                Detrended Price
                                                Oscillator</option>
                                            <option value="DM@tv-basicstudies"
                                                {{ $indicatorSetting->value == 'DM@tv-basicstudies' ? 'selected' : '' }}
                                                attr-short-desc="DMI">Directional Movement
                                            </option>
                                            <option value="DONCH@tv-basicstudies"
                                                {{ $indicatorSetting->value == 'DONCH@tv-basicstudies' ? 'selected' : '' }}
                                                attr-short-desc="DC">Donchian Channels
                                            </option>
                                            <option value="DoubleEMA@tv-basicstudies"
                                                {{ $indicatorSetting->value == 'DoubleEMA@tv-basicstudies' ? 'selected' : '' }}
                                                attr-short-desc="DEMA">Double EMA
                                            </option>
                                            <option value="EaseOfMovement@tv-basicstudies"
                                                {{ $indicatorSetting->value == 'EaseOfMovement@tv-basicstudies' ? 'selected' : '' }}
                                                attr-short-desc="EOM">Ease Of
                                                Movement
                                            </option>
                                            <option value="EFI@tv-basicstudies"
                                                {{ $indicatorSetting->value == 'EFI@tv-basicstudies' ? 'selected' : '' }}
                                                attr-short-desc="EFI">Elder&#39;s Force
                                                Index
                                            </option>
                                            <option value="ENV@tv-basicstudies"
                                                {{ $indicatorSetting->value == 'ENV@tv-basicstudies' ? 'selected' : '' }}
                                                attr-short-desc="Env">Envelope</option>
                                            <option value="FisherTransform@tv-basicstudies"
                                                {{ $indicatorSetting->value == 'FisherTransform@tv-basicstudies' ? 'selected' : '' }}
                                                attr-short-desc="Fisher">
                                                Fisher
                                                Transform
                                            </option>
                                            <option value="HV@tv-basicstudies"
                                                {{ $indicatorSetting->value == 'HV@tv-basicstudies' ? 'selected' : '' }}
                                                attr-short-desc="HV">Historical Volatility
                                            </option>
                                            <option value="hullMA@tv-basicstudies"
                                                {{ $indicatorSetting->value == 'hullMA@tv-basicstudies' ? 'selected' : '' }}
                                                attr-short-desc="HMA">Hull Moving
                                                Average
                                            </option>
                                            <option value="IchimokuCloud@tv-basicstudies"
                                                {{ $indicatorSetting->value == 'IchimokuCloud@tv-basicstudies' ? 'selected' : '' }}
                                                attr-short-desc="Ichimoku">
                                                Ichimoku
                                                Cloud
                                            </option>
                                            <option value="KLTNR@tv-basicstudies"
                                                {{ $indicatorSetting->value == 'KLTNR@tv-basicstudies' ? 'selected' : '' }}
                                                attr-short-desc="KC">Keltner Channels
                                            </option>
                                            <option value="KST@tv-basicstudies"
                                                {{ $indicatorSetting->value == 'KST@tv-basicstudies' ? 'selected' : '' }}
                                                attr-short-desc="KST">Know Sure Thing
                                            </option>
                                            <option value="LinearRegression@tv-basicstudies"
                                                {{ $indicatorSetting->value == 'LinearRegression@tv-basicstudies' ? 'selected' : '' }}
                                                attr-short-desc="Lin Reg">
                                                Linear
                                                Regression
                                            </option>
                                            <option value="MACD@tv-basicstudies"
                                                {{ $indicatorSetting->value == 'MACD@tv-basicstudies' ? 'selected' : '' }}
                                                attr-short-desc="MACD">MACD</option>
                                            <option value="MOM@tv-basicstudies"
                                                {{ $indicatorSetting->value == 'MOM@tv-basicstudies' ? 'selected' : '' }}
                                                attr-short-desc="Mom">Momentum</option>
                                            <option value="MF@tv-basicstudies"
                                                {{ $indicatorSetting->value == 'MF@tv-basicstudies' ? 'selected' : '' }}
                                                attr-short-desc="MFl">Money Flow</option>
                                            <option value="MoonPhases@tv-basicstudies"
                                                {{ $indicatorSetting->value == 'MoonPhases@tv-basicstudies' ? 'selected' : '' }}
                                                attr-short-desc="MP">Moon Phases
                                            </option>
                                            <option value="MASimple@tv-basicstudies"
                                                {{ $indicatorSetting->value == 'MASimple@tv-basicstudies' ? 'selected' : '' }}
                                                attr-short-desc="MA">Moving Average
                                            </option>
                                            <option value="MAExp@tv-basicstudies"
                                                {{ $indicatorSetting->value == 'MAExp@tv-basicstudies' ? 'selected' : '' }}
                                                attr-short-desc="EMA">Moving Average
                                                Exponential
                                            </option>
                                            <option value="MAWeighted@tv-basicstudies"
                                                {{ $indicatorSetting->value == 'MAWeighted@tv-basicstudies' ? 'selected' : '' }}
                                                attr-short-desc="WMA">Moving
                                                Average
                                                Weighted
                                            </option>
                                            <option value="OBV@tv-basicstudies"
                                                {{ $indicatorSetting->value == 'OBV@tv-basicstudies' ? 'selected' : '' }}
                                                attr-short-desc="OBV">On Balance Volume
                                            </option>
                                            <option value="PSAR@tv-basicstudies"
                                                {{ $indicatorSetting->value == 'PSAR@tv-basicstudies' ? 'selected' : '' }}
                                                attr-short-desc="SAR">Parabolic SAR
                                            </option>
                                            <option value="PivotPointsHighLow@tv-basicstudies"
                                                {{ $indicatorSetting->value == 'PivotPointsHighLow@tv-basicstudies' ? 'selected' : '' }}
                                                attr-short-desc="Pivots HL">Pivot
                                                Points
                                                High Low</option>
                                            <option value="PivotPointsStandard@tv-basicstudies"
                                                {{ $indicatorSetting->value == 'PivotPointsStandard@tv-basicstudies' ? 'selected' : '' }}
                                                attr-short-desc="Pivots">
                                                Pivot
                                                Points
                                                Standard</option>
                                            <option value="PriceOsc@tv-basicstudies"
                                                {{ $indicatorSetting->value == 'PriceOsc@tv-basicstudies' ? 'selected' : '' }}
                                                attr-short-desc="PPO">Price
                                                Oscillator
                                            </option>
                                            <option value="PriceVolumeTrend@tv-basicstudies"
                                                {{ $indicatorSetting->value == 'PriceVolumeTrend@tv-basicstudies' ? 'selected' : '' }}
                                                attr-short-desc="PVT">Price
                                                Volume
                                                Trend
                                            </option>
                                            <option value="ROC@tv-basicstudies"
                                                {{ $indicatorSetting->value == 'ROC@tv-basicstudies' ? 'selected' : '' }}
                                                attr-short-desc="ROC">Rate Of Change
                                            </option>
                                            <option value="RSI@tv-basicstudies"
                                                {{ $indicatorSetting->value == 'RSI@tv-basicstudies' ? 'selected' : '' }}
                                                attr-short-desc="RSI">Relative Strength
                                                Index
                                            </option>
                                            <option value="VigorIndex@tv-basicstudies"
                                                {{ $indicatorSetting->value == 'VigorIndex@tv-basicstudies' ? 'selected' : '' }}
                                                attr-short-desc="RVGI">Relative
                                                Vigor Index
                                            </option>
                                            <option value="VolatilityIndex@tv-basicstudies"
                                                {{ $indicatorSetting->value == 'VolatilityIndex@tv-basicstudies' ? 'selected' : '' }}
                                                attr-short-desc="RVI">Relative
                                                Volatility
                                                Index</option>
                                            <option value="SMIErgodicIndicator@tv-basicstudies"
                                                {{ $indicatorSetting->value == 'SMIErgodicIndicator@tv-basicstudies' ? 'selected' : '' }}
                                                attr-short-desc="SMII">SMI
                                                Ergodic
                                                Indicator</option>
                                            <option value="SMIErgodicOscillator@tv-basicstudies"
                                                {{ $indicatorSetting->value == 'SMIErgodicOscillator@tv-basicstudies' ? 'selected' : '' }}
                                                attr-short-desc="SMIO">
                                                SMI
                                                Ergodic
                                                Oscillator</option>
                                            <option value="Stochastic@tv-basicstudies"
                                                {{ $indicatorSetting->value == 'Stochastic@tv-basicstudies' ? 'selected' : '' }}
                                                attr-short-desc="Stoch">Stochastic
                                            </option>
                                            <option value="StochasticRSI@tv-basicstudies"
                                                {{ $indicatorSetting->value == 'StochasticRSI@tv-basicstudies' ? 'selected' : '' }}
                                                attr-short-desc="Stoch RSI">
                                                Stochastic
                                                RSI
                                            </option>
                                            <option value="TripleEMA@tv-basicstudies"
                                                {{ $indicatorSetting->value == 'TripleEMA@tv-basicstudies' ? 'selected' : '' }}
                                                attr-short-desc="TEMA">Triple EMA
                                            </option>
                                            <option value="Trix@tv-basicstudies"
                                                {{ $indicatorSetting->value == 'Trix@tv-basicstudies' ? 'selected' : '' }}
                                                attr-short-desc="TRIX">TRIX</option>
                                            <option value="UltimateOsc@tv-basicstudies"
                                                {{ $indicatorSetting->value == 'UltimateOsc@tv-basicstudies' ? 'selected' : '' }}
                                                attr-short-desc="UO">Ultimate
                                                Oscillator
                                            </option>
                                            <option value="VSTOP@tv-basicstudies"
                                                {{ $indicatorSetting->value == 'VSTOP@tv-basicstudies' ? 'selected' : '' }}
                                                attr-short-desc="VStop">Volatility Stop
                                            </option>
                                            <option value="Volume@tv-basicstudies"
                                                {{ $indicatorSetting->value == 'Volume@tv-basicstudies' ? 'selected' : '' }}
                                                attr-short-desc="Vol">Volume</option>
                                            <option value="VWAP@tv-basicstudies"
                                                {{ $indicatorSetting->value == 'VWAP@tv-basicstudies' ? 'selected' : '' }}
                                                attr-short-desc="VWAP">VWAP</option>
                                            <option value="MAVolumeWeighted@tv-basicstudies"
                                                {{ $indicatorSetting->value == 'MAVolumeWeighted@tv-basicstudies' ? 'selected' : '' }}
                                                attr-short-desc="VWMA">VWMA
                                            </option>
                                            <option value="WilliamR@tv-basicstudies"
                                                {{ $indicatorSetting->value == 'WilliamR@tv-basicstudies' ? 'selected' : '' }}
                                                attr-short-desc="%R">Williams %R
                                            </option>
                                            <option value="WilliamsAlligator@tv-basicstudies"
                                                {{ $indicatorSetting->value == 'WilliamsAlligator@tv-basicstudies' ? 'selected' : '' }}
                                                attr-short-desc="Alligator">
                                                Williams
                                                Alligator</option>
                                            <option value="WilliamsFractal@tv-basicstudies"
                                                {{ $indicatorSetting->value == 'WilliamsFractal@tv-basicstudies' ? 'selected' : '' }}
                                                attr-short-desc="Fractal">
                                                Williams
                                                Fractal
                                            </option>
                                            <option value="ZigZag@tv-basicstudies"
                                                {{ $indicatorSetting->value == 'ZigZag@tv-basicstudies' ? 'selected' : '' }}
                                                attr-short-desc="Zig Zag">Zig Zag
                                            </option>
                                        @endforeach
                                    @else
                                        <option value="ACCD@tv-basicstudies" attr-short-desc="Accum/Dist">
                                            Accumulation/Distribution
                                        </option>
                                        <option value="studyADR@tv-basicstudies" attr-short-desc="ADR">ADR</option>
                                        <option value="AROON@tv-basicstudies" attr-short-desc="Aroon">Aroon</option>
                                        <option value="ATR@tv-basicstudies" attr-short-desc="ATR">Average True Range
                                        </option>
                                        <option value="AwesomeOscillator@tv-basicstudies" attr-short-desc="AO">Awesome
                                            Oscillator
                                        </option>
                                        <option value="BB@tv-basicstudies" attr-short-desc="BB">Bollinger Bands</option>
                                        <option value="BollingerBandsR@tv-basicstudies" attr-short-desc="BB %B">Bollinger
                                            Bands
                                            %B
                                        </option>
                                        <option value="BollingerBandsWidth@tv-basicstudies" attr-short-desc="BBW">
                                            Bollinger
                                            Bands
                                            Width</option>
                                        <option value="CMF@tv-basicstudies" attr-short-desc="CMF">Chaikin Money Flow
                                        </option>
                                        <option value="ChaikinOscillator@tv-basicstudies" attr-short-desc="Chaikin Osc">
                                            Chaikin
                                            Oscillator</option>
                                        <option value="chandeMO@tv-basicstudies" attr-short-desc="ChandeMO">Chande
                                            Momentum
                                            Oscillator
                                        </option>
                                        <option value="ChoppinessIndex@tv-basicstudies" attr-short-desc="CHOP">Choppiness
                                            Index
                                        </option>
                                        <option value="CCI@tv-basicstudies" attr-short-desc="CCI">Commodity Channel Index
                                        </option>
                                        <option value="CRSI@tv-basicstudies" attr-short-desc="CRSI">ConnorsRSI</option>
                                        <option value="CorrelationCoefficient@tv-basicstudies" attr-short-desc="CC">
                                            Correlation
                                            Coefficient</option>
                                        <option value="DetrendedPriceOscillator@tv-basicstudies" attr-short-desc="DPO">
                                            Detrended Price
                                            Oscillator</option>
                                        <option value="DM@tv-basicstudies" attr-short-desc="DMI">Directional Movement
                                        </option>
                                        <option value="DONCH@tv-basicstudies" attr-short-desc="DC">Donchian Channels
                                        </option>
                                        <option value="DoubleEMA@tv-basicstudies" attr-short-desc="DEMA">Double EMA
                                        </option>
                                        <option value="EaseOfMovement@tv-basicstudies" attr-short-desc="EOM">Ease Of
                                            Movement
                                        </option>
                                        <option value="EFI@tv-basicstudies" attr-short-desc="EFI">Elder&#39;s Force Index
                                        </option>
                                        <option value="ENV@tv-basicstudies" attr-short-desc="Env">Envelope</option>
                                        <option value="FisherTransform@tv-basicstudies" attr-short-desc="Fisher">Fisher
                                            Transform
                                        </option>
                                        <option value="HV@tv-basicstudies" attr-short-desc="HV">Historical Volatility
                                        </option>
                                        <option value="hullMA@tv-basicstudies" attr-short-desc="HMA">Hull Moving Average
                                        </option>
                                        <option value="IchimokuCloud@tv-basicstudies" attr-short-desc="Ichimoku">Ichimoku
                                            Cloud
                                        </option>
                                        <option value="KLTNR@tv-basicstudies" attr-short-desc="KC">Keltner Channels
                                        </option>
                                        <option value="KST@tv-basicstudies" attr-short-desc="KST">Know Sure Thing</option>
                                        <option value="LinearRegression@tv-basicstudies" attr-short-desc="Lin Reg">Linear
                                            Regression
                                        </option>
                                        <option value="MACD@tv-basicstudies" attr-short-desc="MACD">MACD</option>
                                        <option value="MOM@tv-basicstudies" attr-short-desc="Mom">Momentum</option>
                                        <option value="MF@tv-basicstudies" attr-short-desc="MFl">Money Flow</option>
                                        <option value="MoonPhases@tv-basicstudies" attr-short-desc="MP">Moon Phases
                                        </option>
                                        <option value="MASimple@tv-basicstudies" attr-short-desc="MA">Moving Average
                                        </option>
                                        <option value="MAExp@tv-basicstudies" attr-short-desc="EMA">Moving Average
                                            Exponential
                                        </option>
                                        <option value="MAWeighted@tv-basicstudies" attr-short-desc="WMA">Moving Average
                                            Weighted
                                        </option>
                                        <option value="OBV@tv-basicstudies" attr-short-desc="OBV">On Balance Volume
                                        </option>
                                        <option value="PSAR@tv-basicstudies" attr-short-desc="SAR">Parabolic SAR</option>
                                        <option value="PivotPointsHighLow@tv-basicstudies" attr-short-desc="Pivots HL">
                                            Pivot
                                            Points
                                            High Low</option>
                                        <option value="PivotPointsStandard@tv-basicstudies" attr-short-desc="Pivots">Pivot
                                            Points
                                            Standard</option>
                                        <option value="PriceOsc@tv-basicstudies" attr-short-desc="PPO">Price Oscillator
                                        </option>
                                        <option value="PriceVolumeTrend@tv-basicstudies" attr-short-desc="PVT">Price
                                            Volume
                                            Trend
                                        </option>
                                        <option value="ROC@tv-basicstudies" attr-short-desc="ROC">Rate Of Change</option>
                                        <option value="RSI@tv-basicstudies" attr-short-desc="RSI">Relative Strength Index
                                        </option>
                                        <option value="VigorIndex@tv-basicstudies" attr-short-desc="RVGI">Relative Vigor
                                            Index
                                        </option>
                                        <option value="VolatilityIndex@tv-basicstudies" attr-short-desc="RVI">Relative
                                            Volatility
                                            Index</option>
                                        <option value="SMIErgodicIndicator@tv-basicstudies" attr-short-desc="SMII">SMI
                                            Ergodic
                                            Indicator</option>
                                        <option value="SMIErgodicOscillator@tv-basicstudies" attr-short-desc="SMIO">SMI
                                            Ergodic
                                            Oscillator</option>
                                        <option value="Stochastic@tv-basicstudies" attr-short-desc="Stoch">Stochastic
                                        </option>
                                        <option value="StochasticRSI@tv-basicstudies" attr-short-desc="Stoch RSI">
                                            Stochastic
                                            RSI
                                        </option>
                                        <option value="TripleEMA@tv-basicstudies" attr-short-desc="TEMA">Triple EMA
                                        </option>
                                        <option value="Trix@tv-basicstudies" attr-short-desc="TRIX">TRIX</option>
                                        <option value="UltimateOsc@tv-basicstudies" attr-short-desc="UO">Ultimate
                                            Oscillator
                                        </option>
                                        <option value="VSTOP@tv-basicstudies" attr-short-desc="VStop">Volatility Stop
                                        </option>
                                        <option value="Volume@tv-basicstudies" attr-short-desc="Vol">Volume</option>
                                        <option value="VWAP@tv-basicstudies" attr-short-desc="VWAP">VWAP</option>
                                        <option value="MAVolumeWeighted@tv-basicstudies" attr-short-desc="VWMA">VWMA
                                        </option>
                                        <option value="WilliamR@tv-basicstudies" attr-short-desc="%R">Williams %R</option>
                                        <option value="WilliamsAlligator@tv-basicstudies" attr-short-desc="Alligator">
                                            Williams
                                            Alligator</option>
                                        <option value="WilliamsFractal@tv-basicstudies" attr-short-desc="Fractal">Williams
                                            Fractal
                                        </option>
                                        <option value="ZigZag@tv-basicstudies" attr-short-desc="Zig Zag">Zig Zag</option>
                                    @endif

                                </select>
                                @error('')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Bar Style</label>
                                <select class="form-select" name="style" aria-label="Default select example">
                                    <option value="1" {{ $tradingSetting->style == '1' ? 'selected' : '' }}>Candles
                                    </option>
                                    <option value="0" {{ $tradingSetting->style == '0' ? 'selected' : '' }}>Bars
                                    </option>
                                    <option value="9" {{ $tradingSetting->style == '9' ? 'selected' : '' }}>Hollow
                                        Candles</option>
                                    <option value="8" {{ $tradingSetting->style == '8' ? 'selected' : '' }}>Heikin
                                        Ashi</option>
                                    <option value="2" {{ $tradingSetting->style == '2' ? 'selected' : '' }}>Line
                                    </option>
                                    <option value="3" {{ $tradingSetting->style == '3' ? 'selected' : '' }}>Area
                                    </option>
                                    <option value="4" {{ $tradingSetting->style == '4' ? 'selected' : '' }}>Renko
                                    </option>
                                    <option value="7" {{ $tradingSetting->style == '7' ? 'selected' : '' }}>Line
                                        Break</option>
                                    <option value="5" {{ $tradingSetting->style == '5' ? 'selected' : '' }}>Kagi
                                    </option>
                                    <option value="6" {{ $tradingSetting->style == '6' ? 'selected' : '' }}>Point and
                                        Figure</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Color Theme</label>
                                <select class="form-select" name="theme" aria-label="Default select example">
                                    <option selected value="light"
                                        {{ $tradingSetting->theme == 'light' ? 'selected' : '' }}>Light</option>
                                    <option value="dark" {{ $tradingSetting->theme == 'dark' ? 'selected' : '' }}>Dark
                                    </option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Default timezone</label>
                                <select class="form-select" name="timezone">

                                    <option value="Etc/GMT+12">(GMT-12:00) International Date Line West</option>
                                    <option value="Pacific/Midway">(GMT-11:00) Midway Island, Samoa</option>
                                    <option value="Pacific/Honolulu">(GMT-10:00) Hawaii</option>
                                    <option value="US/Alaska">(GMT-09:00) Alaska</option>
                                    <option value="America/Los_Angeles">(GMT-08:00) Pacific Time (US & Canada)</option>
                                    <option value="America/Tijuana">(GMT-08:00) Tijuana, Baja California</option>
                                    <option value="US/Arizona">(GMT-07:00) Arizona</option>
                                    <option value="America/Chihuahua">(GMT-07:00) Chihuahua, La Paz, Mazatlan</option>
                                    <option value="US/Mountain">(GMT-07:00) Mountain Time (US & Canada)</option>
                                    <option value="America/Managua">(GMT-06:00) Central America</option>
                                    <option value="US/Central">(GMT-06:00) Central Time (US & Canada)</option>
                                    <option value="America/Mexico_City">(GMT-06:00) Guadalajara, Mexico City, Monterrey
                                    </option>
                                    <option value="Canada/Saskatchewan">(GMT-06:00) Saskatchewan</option>
                                    <option value="America/Bogota">(GMT-05:00) Bogota, Lima, Quito, Rio Branco</option>
                                    <option value="US/Eastern">(GMT-05:00) Eastern Time (US & Canada)</option>
                                    <option value="US/East-Indiana">(GMT-05:00) Indiana (East)</option>
                                    <option value="Canada/Atlantic">(GMT-04:00) Atlantic Time (Canada)</option>
                                    <option value="America/Caracas">(GMT-04:00) Caracas, La Paz</option>
                                    <option value="America/Manaus">(GMT-04:00) Manaus</option>
                                    <option value="America/Santiago">(GMT-04:00) Santiago</option>
                                    <option value="Canada/Newfoundland">(GMT-03:30) Newfoundland</option>
                                    <option value="America/Sao_Paulo">(GMT-03:00) Brasilia</option>
                                    <option value="America/Argentina/Buenos_Aires">(GMT-03:00) Buenos Aires, Georgetown
                                    </option>
                                    <option value="America/Godthab">(GMT-03:00) Greenland</option>
                                    <option value="America/Montevideo">(GMT-03:00) Montevideo</option>
                                    <option value="America/Noronha">(GMT-02:00) Mid-Atlantic</option>
                                    <option value="Atlantic/Cape_Verde">(GMT-01:00) Cape Verde Is.</option>
                                    <option value="Atlantic/Azores">(GMT-01:00) Azores</option>
                                    <option value="Africa/Casablanca">(GMT+00:00) Casablanca, Monrovia, Reykjavik</option>
                                    <option value="Etc/Greenwich">(GMT+00:00) Greenwich Mean Time : Dublin, Edinburgh,
                                        Lisbon,
                                        London</option>
                                    <option value="Europe/Amsterdam">(GMT+01:00) Amsterdam, Berlin, Bern, Rome, Stockholm,
                                        Vienna
                                    </option>
                                    <option value="Europe/Belgrade">(GMT+01:00) Belgrade, Bratislava, Budapest, Ljubljana,
                                        Prague
                                    </option>
                                    <option value="Europe/Brussels">(GMT+01:00) Brussels, Copenhagen, Madrid, Paris
                                    </option>
                                    <option value="Europe/Sarajevo">(GMT+01:00) Sarajevo, Skopje, Warsaw, Zagreb</option>
                                    <option value="Africa/Lagos">(GMT+01:00) West Central Africa</option>
                                    <option value="Asia/Amman">(GMT+02:00) Amman</option>
                                    <option value="Europe/Athens">(GMT+02:00) Athens, Bucharest, Istanbul</option>
                                    <option value="Asia/Beirut">(GMT+02:00) Beirut</option>
                                    <option value="Africa/Cairo">(GMT+02:00) Cairo</option>
                                    <option value="Africa/Harare">(GMT+02:00) Harare, Pretoria</option>
                                    <option value="Europe/Helsinki">(GMT+02:00) Helsinki, Kyiv, Riga, Sofia, Tallinn,
                                        Vilnius
                                    </option>
                                    <option value="Asia/Jerusalem">(GMT+02:00) Jerusalem</option>
                                    <option value="Europe/Minsk">(GMT+02:00) Minsk</option>
                                    <option value="Africa/Windhoek">(GMT+02:00) Windhoek</option>
                                    <option value="Asia/Kuwait">(GMT+03:00) Kuwait, Riyadh, Baghdad</option>
                                    <option value="Europe/Moscow">(GMT+03:00) Moscow, St. Petersburg, Volgograd</option>
                                    <option value="Africa/Nairobi">(GMT+03:00) Nairobi</option>
                                    <option value="Asia/Tbilisi">(GMT+03:00) Tbilisi</option>
                                    <option value="Asia/Tehran">(GMT+03:30) Tehran</option>
                                    <option value="Asia/Muscat">(GMT+04:00) Abu Dhabi, Muscat</option>
                                    <option value="Asia/Baku">(GMT+04:00) Baku</option>
                                    <option value="Asia/Yerevan">(GMT+04:00) Yerevan</option>
                                    <option value="Asia/Kabul">(GMT+04:30) Kabul</option>
                                    <option value="Asia/Yekaterinburg">(GMT+05:00) Yekaterinburg</option>
                                    <option value="Asia/Karachi">(GMT+05:00) Islamabad, Karachi, Tashkent</option>
                                    <option value="Asia/Calcutta">(GMT+05:30) Chennai, Kolkata, Mumbai, New Delhi</option>
                                    <option value="Asia/Calcutta">(GMT+05:30) Sri Jayawardenapura</option>
                                    <option value="Asia/Katmandu" selected>(GMT+05:45) Kathmandu</option>
                                    <option value="Asia/Almaty">(GMT+06:00) Almaty, Novosibirsk</option>
                                    <option value="Asia/Dhaka">(GMT+06:00) Astana, Dhaka</option>
                                    <option value="Asia/Rangoon">(GMT+06:30) Yangon (Rangoon)</option>
                                    <option value="Asia/Bangkok">(GMT+07:00) Bangkok, Hanoi, Jakarta</option>
                                    <option value="Asia/Krasnoyarsk">(GMT+07:00) Krasnoyarsk</option>
                                    <option value="Asia/Hong_Kong">(GMT+08:00) Beijing, Chongqing, Hong Kong, Urumqi
                                    </option>
                                    <option value="Asia/Kuala_Lumpur">(GMT+08:00) Kuala Lumpur, Singapore</option>
                                    <option value="Asia/Irkutsk">(GMT+08:00) Irkutsk, Ulaan Bataar</option>
                                    <option value="Australia/Perth">(GMT+08:00) Perth</option>
                                    <option value="Asia/Taipei">(GMT+08:00) Taipei</option>
                                    <option value="Asia/Tokyo">(GMT+09:00) Osaka, Sapporo, Tokyo</option>
                                    <option value="Asia/Seoul">(GMT+09:00) Seoul</option>
                                    <option value="Asia/Yakutsk">(GMT+09:00) Yakutsk</option>
                                    <option value="Australia/Adelaide">(GMT+09:30) Adelaide</option>
                                    <option value="Australia/Darwin">(GMT+09:30) Darwin</option>
                                    <option value="Australia/Brisbane">(GMT+10:00) Brisbane</option>
                                    <option value="Australia/Canberra">(GMT+10:00) Canberra, Melbourne, Sydney</option>
                                    <option value="Australia/Hobart">(GMT+10:00) Hobart</option>
                                    <option value="Pacific/Guam">(GMT+10:00) Guam, Port Moresby</option>
                                    <option value="Asia/Vladivostok">(GMT+10:00) Vladivostok</option>
                                    <option value="Asia/Magadan">(GMT+11:00) Magadan, Solomon Is., New Caledonia</option>
                                    <option value="Pacific/Auckland">(GMT+12:00) Auckland, Wellington</option>
                                    <option value="Pacific/Fiji">(GMT+12:00) Fiji, Kamchatka, Marshall Is.</option>
                                    <option value="Pacific/Tongatapu">(GMT+13:00) Nuku'alofa</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Language</label>
                                <select name="locale" class="form-select">
                                    <option value="en" selected>English</option>
                                    <option value="in">English(India)</option>
                                    <option value="de_DE">Deutsch</option>
                                    <option value="fr">Français</option>
                                    <option value="ca_ES">Català</option>
                                    <option value="es">Español</option>
                                    <option value="it">Italiano</option>
                                    <option value="pl">Polski</option>
                                    <option value="hu_HU">Magyar</option>
                                    <option value="sv_SE">Svenska</option>
                                    <option value="tr">Türkçe</option>
                                    <option value="ru">Русский</option>
                                    <option value="br">Português</option>
                                    <option value="id">Bahasa Indonesia</option>
                                    <option value="ms_MY">Bahasa Melayu</option>
                                    <option value="th_TH">ภาษาไทย</option>
                                    <option value="vi_VN">Tiếng Việt</option>
                                    <option value="ja">日本語</option>
                                    <option value="kr">한국어</option>
                                    <option value="zh_CN">简体中文</option>
                                    <option value="zh_TW">繁體中文</option>
                                    <option value="ar_AE">العربية</option>
                                    <option value="he_IL">עברית</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Default Date Range</label>
                                <select class="form-select" name="range" aria-label="Default select example">
                                    <option value="">Select Date Range</option>
                                    <option value="1D" {{ $tradingSetting->range == '1D' ? 'selected' : '' }}>1D
                                    </option>
                                    <option value="5D" {{ $tradingSetting->range == '5D' ? 'selected' : '' }}>5D
                                    </option>
                                    <option value="1M" {{ $tradingSetting->range == '1M' ? 'selected' : '' }}>1M
                                    </option>
                                    <option value="3M" {{ $tradingSetting->range == '3M' ? 'selected' : '' }}>3M
                                    </option>
                                    <option value="6M" {{ $tradingSetting->range == '6M' ? 'selected' : '' }}>6M
                                    </option>
                                    <option value="YTD" {{ $tradingSetting->range == 'YTD' ? 'selected' : '' }}>YTD
                                    </option>
                                    <option value="12M" {{ $tradingSetting->range == '12M' ? 'selected' : '' }}>1Y
                                    </option>
                                    <option value="60M" {{ $tradingSetting->range == '60M' ? 'selected' : '' }}>5Y
                                    </option>
                                    <option value="ALL" {{ $tradingSetting->range == 'ALL' ? 'selected' : '' }}>ALL
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Width</label>
                                <input type="number" class="form-control" name="width"
                                    aria-label="Default select example"
                                    value="{{ $tradingSetting->width ? $tradingSetting->width : '1200' }}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Height</label>
                                <input type="number" class="form-control" name="height"
                                    aria-label="Default select example"
                                    value="{{ $tradingSetting->height ? $tradingSetting->height : '800' }}">
                            </div>
                        </div>
                        <div class="col-md-3 pl-4">
                            <div class="mb-3 ">
                                <input name="hide_top_toolbar" class="form-check-input" type="checkbox" value="1"
                                    id="hide_top_toolbar"
                                    {{ $tradingSetting->hide_top_toolbar == true ? 'checked' : '' }} checked>
                                <label class="form-check-label" for="hide_top_toolbar">
                                    Show top toolbar
                                </label>
                            </div>
                        </div>
                        <div class="col-md-3 pl-4">
                            <div class="mb-3">
                                <input name="withdateranges" class="form-check-input" type="checkbox" value="1"
                                    id="withdateranges" {{ $tradingSetting->withdateranges == true ? 'checked' : '' }} checked>
                                <label class="form-check-label" for="withdateranges">
                                    Show bottom toolbar
                                </label>
                            </div>
                        </div>
                        <div class="col-md-3 pl-4">
                            <div class="mb-3">
                                <input name="hide_side_toolbar" class="form-check-input" type="checkbox" value="1"
                                    id="hide_side_toolbar"
                                    {{ $tradingSetting->hide_side_toolbar == true ? 'checked' : '' }} checked>
                                <label class="form-check-label" for="hide_side_toolbar">
                                    Show drawing toolbar
                                </label>
                            </div>
                        </div>

                        <div class="col-md-3 pl-4">
                            <div class="mb-3">
                                <input name="allow_symbol_change" class="form-check-input" type="checkbox"
                                    value="1" id="allow_symbol_change"
                                    {{ $tradingSetting->allow_symbol_change == true ? 'checked' : '' }} checked>
                                <label class="form-check-label" for="allow_symbol_change">
                                    Show allow_symbol_change
                                </label>
                            </div>
                        </div>

                        <div class="col-md-3 pl-4">
                            <div class="mb-3">
                                <input name="details" class="form-check-input" type="checkbox" value="1"
                                    id="details" {{ $tradingSetting->details == true ? 'checked' : '' }}>
                                <label class="form-check-label" for="details">
                                    Show Details
                                </label>
                            </div>
                        </div>

                        <div class="col-md-3 pl-4">
                            <div class="mb-3">
                                <input name="calendar" class="form-check-input" type="checkbox" value="1"
                                    id="calendar" {{ $tradingSetting->calendar == true ? 'checked' : '' }}>
                                <label class="form-check-label" for="calendar">
                                    Show calendar
                                </label>
                            </div>
                        </div>
                        <div class="col-md-3 pl-4">
                            <div class="mb-3">
                                <input name="hotlist" class="form-check-input" type="checkbox" value="1"
                                    id="hotlist" {{ $tradingSetting->hotlist == true ? 'checked' : '' }}>
                                <label class="form-check-label" for="hotlist">
                                    Show hotlist
                                </label>
                            </div>
                        </div>
                        <div class="col-md-3 pl-4">
                            <div class="mb-3">
                                <input name="enable_publishing" class="form-check-input" type="checkbox" value="1"
                                    id="enable_publishing" value="1"
                                    {{ $tradingSetting->enable_publishing == true ? 'checked' : '' }}>
                                <label class="form-check-label" for="enable_publishing">
                                    Show enable publishing
                                </label>
                            </div>
                        </div>
                        <div class="col-md-3 pl-4">
                            <div class="mb-3">
                                <input name="save_image" class="form-check-input" type="checkbox" value="1"
                                    id="save_image" value="1"
                                    {{ $tradingSetting->save_image == true ? 'checked' : '' }}>
                                <label class="form-check-label" for="save_image">
                                    Show «Get image» button
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Apply</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="row justify-content-center py-3">
        @if ($tradingSetting->id)
            <div class="col-md-12">
                <!-- TradingView Widget BEGIN -->
                <div class="tradingview-widget-container table-responsive">
                    <div id="tradingview_{{ $tradingSetting->id ?? '00' }}"></div>
                </div>
                <!-- TradingView Widget END -->
            </div>
        @endif
    </div>
    @push('scripts')
        <script>
            $('#multi-select').select2({
                theme: 'bootstrap4',
                placeholder: "Add Indicatores",
            });

            $("#multi-select").on("select2:select", function(e) {
                e.preventDefault();
                let limite_periodos = $("#schemas").val().length;
                var element = e.params.data.element;
                var $element = $(element);
                $element.detach();
                $(this).append($element);
                $(this).trigger("change");
                $("#multi-select").append('<option value="' + e.params.data.text + '">' + e.params.data.text +
                    '</option>');
                $('#multi-select').trigger('select2:close');
                return true;
            });
            $('#multi-select').on('select2:unselect', function(event) {
                var detect = false;
                var element = event.params.data.text;
                var selections = $('#multi-select').select2('data');
                var el = event.params.data.element;
                var $el = $(el);
                $el.detach();
            });
            $('#multi-select').on('select2:close', function(event) {
                var select = document.getElementById("periodos");
                var options = [];
                document.querySelectorAll('#multi-select > option').forEach(
                    option => options.push(option)
                );
                while (select.firstChild) {
                    select.removeChild(select.firstChild);
                }
                options.sort((a, b) => parseInt(a.innerText) - parseInt(b.innerText));
                for (var i in options) {
                    select.appendChild(options[i]);
                }
            });
        </script>
    @endpush
    @if ($tradingSetting->id)
        @include('backend.trading-setting.scripts')
    @endif
@endsection
