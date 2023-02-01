<?php

namespace Database\Seeders;

use App\Models\Indicator;
use Illuminate\Database\Seeder;

class IndicatorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $indicators = [
            [
                "name" => "ADR",
                "value" => "ACCD@tv-basicstudies",
            ],
            [
                "name" => "Aroon",
                "value" => "studyADR@tv-basicstudies",
            ],
            [
                "name" => "Average True Range",
                "value" => "AROON@tv-basicstudies",
            ],
            [
                "name" => "Awesome Oscillator",
                "value" => "ATR@tv-basicstudies",
            ],
            [
                "name" => "Awesome Oscillator",
                "value" => "AwesomeOscillator@tv-basicstudies",
            ],
            [
                "name" => "Bollinger Bands",
                "value" => "BB@tv-basicstudies",
            ],
            [
                "name" => "Bollinger Bands %B",
                "value" => "BollingerBandsR@tv-basicstudies",
            ],
            [
                "name" => "Bollinger Bands Width",
                "value" => "BollingerBandsWidth@tv-basicstudies",
            ],
            [
                "name" => "Chaikin Money Flow",
                "value" => "CMF@tv-basicstudies",
            ],
            [
                "name" => "Chaikin Oscillator",
                "value" => "ChaikinOscillator@tv-basicstudies",
            ],
            [
                "name" => "Chande Momentum Oscillator",
                "value" => "chandeMO@tv-basicstudies",
            ],
            [
                "name" => "Choppiness Index",
                "value" => "ChoppinessIndex@tv-basicstudies",
            ],
            [
                "name" => "Commodity Channel Index",
                "value" => "CCI@tv-basicstudies",
            ],
            [
                "name" => "ConnorsRSI",
                "value" => "CRSI@tv-basicstudies",
            ],
            [
                "name" => "Correlation Coefficient",
                "value" => "CorrelationCoefficient@tv-basicstudies",
            ],
            [
                "name" => "Detrended Price Oscillator",
                "value" => "DetrendedPriceOscillator@tv-basicstudies",
            ],
            [
                "name" => "Directional Movement",
                "value" => "DM@tv-basicstudies",
            ],
            [
                "name" => "Donchian Channels",
                "value" => "DONCH@tv-basicstudies",
            ],
            [
                "name" => "Double EMA",
                "value" => "DoubleEMA@tv-basicstudies",
            ],
            [
                "name" => "Ease Of Movement",
                "value" => "EaseOfMovement@tv-basicstudies",
            ],
            [
                "name" => "Elder&#39;s Force Index",
                "value" => "EFI@tv-basicstudies",
            ],
            [
                "name" => "Envelope",
                "value" => "ENV@tv-basicstudies",
            ],
            [
                "name" => "Fisher Transform",
                "value" => "FisherTransform@tv-basicstudies",
            ],
            [
                "name" => "Historical Volatility",
                "value" => "HV@tv-basicstudies",
            ],
            [
                "name" => "Hull Moving Average",
                "value" => "hullMA@tv-basicstudies",
            ],
            [
                "name" => "Ichimoku Cloud",
                "value" => "IchimokuCloud@tv-basicstudies",
            ],
            [
                "name" => "Keltner Channels",
                "value" => "KLTNR@tv-basicstudies",
            ],
            [
                "name" => "Know Sure Thing",
                "value" => "KST@tv-basicstudies",
            ],
            [
                "name" => "Linear Regression",
                "value" => "LinearRegression@tv-basicstudies",
            ],
            [
                "name" => "MACD",
                "value" => "MACD@tv-basicstudies",
            ],
            [
                "name" => "Momentum",
                "value" => "MOM@tv-basicstudies",
            ],
            [
                "name" => "Money Flow",
                "value" => "MF@tv-basicstudies",
            ],
            [
                "name" => "Moon Phases",
                "value" => "MoonPhases@tv-basicstudies",
            ],
            [
                "name" => "Moving Average",
                "value" => "MASimple@tv-basicstudies",
            ],
            [
                "name" => "Moving Average Exponential",
                "value" => "MAExp@tv-basicstudies",
            ],
            [
                "name" => "Moving Average Weighted",
                "value" => "MAWeighted@tv-basicstudies",
            ],
            [
                "name" => "On Balance Volume",
                "value" => "OBV@tv-basicstudies",
            ],
            [
                "name" => "Parabolic SAR",
                "value" => "PSAR@tv-basicstudies",
            ],
            [
                "name" => "Pivot Points High Low",
                "value" => "PivotPointsHighLow@tv-basicstudies",
            ],
            [
                "name" => "Pivot Points Standard",
                "value" => "PivotPointsStandard@tv-basicstudies",
            ],
            [
                "name" => "Price Oscillator",
                "value" => "PriceOsc@tv-basicstudies",
            ],
            [
                "name" => "Price Volume Trend",
                "value" => "PriceVolumeTrend@tv-basicstudies",
            ],
            [
                "name" => "Rate Of Change",
                "value" => "ROC@tv-basicstudies",
            ],
            [
                "name" => "Relative Strength Index",
                "value" => "RSI@tv-basicstudies",
            ],
            [
                "name" => "Relative Vigor Index",
                "value" => "VigorIndex@tv-basicstudies",
            ],
            [
                "name" => "Relative Volatility Index",
                "value" => "VolatilityIndex@tv-basicstudies",
            ],
            [
                "name" => "SMI Ergodic Indicator",
                "value" => "SMIErgodicIndicator@tv-basicstudies",
            ],
            [
                "name" => "SMI Ergodic Oscillator",
                "value" => "SMIErgodicOscillator@tv-basicstudies",
            ],
            [
                "name" => "Stochastic",
                "value" => "Stochastic@tv-basicstudies",
            ],
            [
                "name" => "Stochastic RSI",
                "value" => "StochasticRSI@tv-basicstudies",
            ],
            [
                "name" => "Triple EMA",
                "value" => "TripleEMA@tv-basicstudies",
            ],
            [
                "name" => "TRIX",
                "value" => "Trix@tv-basicstudies",
            ],
            [
                "name" => "Ultimate Oscillator",
                "value" => "UltimateOsc@tv-basicstudies",
            ],
            [
                "name" => "Volatility Stop",
                "value" => "VSTOP@tv-basicstudies",
            ],
            [
                "name" => "Volume",
                "value" => "Volume@tv-basicstudies",
            ],
            [
                "name" => "VWAP",
                "value" => "VWAP@tv-basicstudies",
            ],
            [
                "name" => "VWMA",
                "value" => "MAVolumeWeighted@tv-basicstudies",
            ],
            [
                "name" => "Williams %R",
                "value" => "WilliamR@tv-basicstudies",
            ],
            [
                "name" => "Williams Alligator",
                "value" => "WilliamsAlligator@tv-basicstudies",
            ],
            [
                "name" => "Williams Fractal",
                "value" => "WilliamsFractal@tv-basicstudies",
            ],
            [
                "name" => "Zig Zag",
                "value" => "ZigZag@tv-basicstudies",
            ],
        ];

        foreach ($indicators as $indicator) {
            Indicator::create($indicator);
        }
    }
}
