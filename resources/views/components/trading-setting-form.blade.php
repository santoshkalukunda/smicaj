<div class="bg-white p-2">
    <form action="{{ route('trading-settings.store') }}" method="post">
        @csrf
        <div class="row">
            <div class="col-md-12">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Trading</label>
                    <select class="form-select" name="trading" aria-label="Default select example">
                        <option value="">Select Trading</option>
                        <option value="intraday_trading">Intraday Trading</option>
                        <option value="swing_trading">Swing Trading</option>
                        <option value="long_term-trading">Long Term Trading</option>
                    </select>
                </div>
            </div>
            <div class="col-md-12">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Trading Time</label>
                    <select class="form-select" name="trading_time" aria-label="Default select example">
                        <option value="">Select trading time</option>
                        <option value="very_short_term">Very Short Term</option>
                        <option value="Short_term">Short Term</option>
                        <option value="long_term">Long Term</option>
                    </select>
                </div>
            </div>
            <div class="col-md-12">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Buy/Sell</label>
                    <select class="form-select" name="buy_sell" aria-label="Default select example">
                        <option value="">Select Buy/Sell</option>
                        <option value="1">Buy</option>
                        <option value="0">Sell</option>
                    </select>
                </div>
            </div>
            <div class="col-md-12">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Default Interval</label>
                    <select class="form-select" name="interval" aria-label="Default select example">
                        <option selected value="1m">1 minute</option>
                        <option value="3m">3 minutes</option>
                        <option value="5m">5 minutes</option>
                        <option value="15m">15 minutes</option>
                        <option value="30m">30 minutes</option>
                        <option value="45m">45 minutes</option>
                        <option value="1h">1 hour</option>
                        <option value="2h">2 hour</option>
                        <option value="3h">3 hour</option>
                        <option value="4h">4 hour</option>
                        <option value="D">1 Day</option>
                    </select>
                </div>
            </div>
            <div class="col-md-12">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Indicators</label>
                    <select id="multi-select" name="studies[]" class="form-select"
                        aria-placeholder="Add indicators" multiple>
                        {{-- @foreach ($indicators as $indicator)
                            <option value="{{ $indicator->id }}">{{ $indicator->name }}</option>
                        @endforeach --}}
                        <option value="ACCD@tv-basicstudies" attr-short-desc="Accum/Dist">Accumulation/Distribution
                        </option>
                        <option value="studyADR@tv-basicstudies" attr-short-desc="ADR">ADR</option>
                        <option value="AROON@tv-basicstudies" attr-short-desc="Aroon">Aroon</option>
                        <option value="ATR@tv-basicstudies" attr-short-desc="ATR">Average True Range</option>
                        <option value="AwesomeOscillator@tv-basicstudies" attr-short-desc="AO">Awesome Oscillator
                        </option>
                        <option value="BB@tv-basicstudies" attr-short-desc="BB">Bollinger Bands</option>
                        <option value="BollingerBandsR@tv-basicstudies" attr-short-desc="BB %B">Bollinger Bands %B
                        </option>
                        <option value="BollingerBandsWidth@tv-basicstudies" attr-short-desc="BBW">Bollinger Bands
                            Width</option>
                        <option value="CMF@tv-basicstudies" attr-short-desc="CMF">Chaikin Money Flow</option>
                        <option value="ChaikinOscillator@tv-basicstudies" attr-short-desc="Chaikin Osc">Chaikin
                            Oscillator</option>
                        <option value="chandeMO@tv-basicstudies" attr-short-desc="ChandeMO">Chande Momentum Oscillator
                        </option>
                        <option value="ChoppinessIndex@tv-basicstudies" attr-short-desc="CHOP">Choppiness Index
                        </option>
                        <option value="CCI@tv-basicstudies" attr-short-desc="CCI">Commodity Channel Index</option>
                        <option value="CRSI@tv-basicstudies" attr-short-desc="CRSI">ConnorsRSI</option>
                        <option value="CorrelationCoefficient@tv-basicstudies" attr-short-desc="CC">Correlation
                            Coefficient</option>
                        <option value="DetrendedPriceOscillator@tv-basicstudies" attr-short-desc="DPO">Detrended Price
                            Oscillator</option>
                        <option value="DM@tv-basicstudies" attr-short-desc="DMI">Directional Movement</option>
                        <option value="DONCH@tv-basicstudies" attr-short-desc="DC">Donchian Channels</option>
                        <option value="DoubleEMA@tv-basicstudies" attr-short-desc="DEMA">Double EMA</option>
                        <option value="EaseOfMovement@tv-basicstudies" attr-short-desc="EOM">Ease Of Movement</option>
                        <option value="EFI@tv-basicstudies" attr-short-desc="EFI">Elder&#39;s Force Index</option>
                        <option value="ENV@tv-basicstudies" attr-short-desc="Env">Envelope</option>
                        <option value="FisherTransform@tv-basicstudies" attr-short-desc="Fisher">Fisher Transform
                        </option>
                        <option value="HV@tv-basicstudies" attr-short-desc="HV">Historical Volatility</option>
                        <option value="hullMA@tv-basicstudies" attr-short-desc="HMA">Hull Moving Average</option>
                        <option value="IchimokuCloud@tv-basicstudies" attr-short-desc="Ichimoku">Ichimoku Cloud
                        </option>
                        <option value="KLTNR@tv-basicstudies" attr-short-desc="KC">Keltner Channels</option>
                        <option value="KST@tv-basicstudies" attr-short-desc="KST">Know Sure Thing</option>
                        <option value="LinearRegression@tv-basicstudies" attr-short-desc="Lin Reg">Linear Regression
                        </option>
                        <option value="MACD@tv-basicstudies" attr-short-desc="MACD">MACD</option>
                        <option value="MOM@tv-basicstudies" attr-short-desc="Mom">Momentum</option>
                        <option value="MF@tv-basicstudies" attr-short-desc="MFl">Money Flow</option>
                        <option value="MoonPhases@tv-basicstudies" attr-short-desc="MP">Moon Phases</option>
                        <option value="MASimple@tv-basicstudies" attr-short-desc="MA">Moving Average</option>
                        <option value="MAExp@tv-basicstudies" attr-short-desc="EMA">Moving Average Exponential
                        </option>
                        <option value="MAWeighted@tv-basicstudies" attr-short-desc="WMA">Moving Average Weighted
                        </option>
                        <option value="OBV@tv-basicstudies" attr-short-desc="OBV">On Balance Volume</option>
                        <option value="PSAR@tv-basicstudies" attr-short-desc="SAR">Parabolic SAR</option>
                        <option value="PivotPointsHighLow@tv-basicstudies" attr-short-desc="Pivots HL">Pivot Points
                            High Low</option>
                        <option value="PivotPointsStandard@tv-basicstudies" attr-short-desc="Pivots">Pivot Points
                            Standard</option>
                        <option value="PriceOsc@tv-basicstudies" attr-short-desc="PPO">Price Oscillator</option>
                        <option value="PriceVolumeTrend@tv-basicstudies" attr-short-desc="PVT">Price Volume Trend
                        </option>
                        <option value="ROC@tv-basicstudies" attr-short-desc="ROC">Rate Of Change</option>
                        <option value="RSI@tv-basicstudies" attr-short-desc="RSI">Relative Strength Index</option>
                        <option value="VigorIndex@tv-basicstudies" attr-short-desc="RVGI">Relative Vigor Index
                        </option>
                        <option value="VolatilityIndex@tv-basicstudies" attr-short-desc="RVI">Relative Volatility
                            Index</option>
                        <option value="SMIErgodicIndicator@tv-basicstudies" attr-short-desc="SMII">SMI Ergodic
                            Indicator</option>
                        <option value="SMIErgodicOscillator@tv-basicstudies" attr-short-desc="SMIO">SMI Ergodic
                            Oscillator</option>
                        <option value="Stochastic@tv-basicstudies" attr-short-desc="Stoch">Stochastic</option>
                        <option value="StochasticRSI@tv-basicstudies" attr-short-desc="Stoch RSI">Stochastic RSI
                        </option>
                        <option value="TripleEMA@tv-basicstudies" attr-short-desc="TEMA">Triple EMA</option>
                        <option value="Trix@tv-basicstudies" attr-short-desc="TRIX">TRIX</option>
                        <option value="UltimateOsc@tv-basicstudies" attr-short-desc="UO">Ultimate Oscillator</option>
                        <option value="VSTOP@tv-basicstudies" attr-short-desc="VStop">Volatility Stop</option>
                        <option value="Volume@tv-basicstudies" attr-short-desc="Vol">Volume</option>
                        <option value="VWAP@tv-basicstudies" attr-short-desc="VWAP">VWAP</option>
                        <option value="MAVolumeWeighted@tv-basicstudies" attr-short-desc="VWMA">VWMA</option>
                        <option value="WilliamR@tv-basicstudies" attr-short-desc="%R">Williams %R</option>
                        <option value="WilliamsAlligator@tv-basicstudies" attr-short-desc="Alligator">Williams
                            Alligator</option>
                        <option value="WilliamsFractal@tv-basicstudies" attr-short-desc="Fractal">Williams Fractal
                        </option>
                        <option value="ZigZag@tv-basicstudies" attr-short-desc="Zig Zag">Zig Zag</option>
                   
                    </select>
                    @push('scripts')
                        <script>
                            $('#multi-select').select2({
                                theme: 'bootstrap4',
                                placeholder: "Add Indicatores",
                            });
                        </script>
                    @endpush
                </div>
            </div>

            <div class="col-md-12">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Bar Style</label>
                    <select class="form-select" name="style" aria-label="Default select example">
                        <option value="0">Bars</option>
                        <option value="1" selected="selected">Candles</option>
                        <option value="9">Hollow Candles</option>
                        <option value="8">Heikin Ashi</option>
                        <option value="2">Line</option>
                        <option value="3">Area</option>
                        <option value="4">Renko</option>
                        <option value="7">Line Break</option>
                        <option value="5">Kagi</option>
                        <option value="6">Point and Figure</option>
                    </select>
                </div>
            </div>
            <div class="col-md-12">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Color Theme</label>
                    <select class="form-select" name="theme" aria-label="Default select example">
                        <option selected value="light">Light</option>
                        <option value="dark">Dark</option>
                    </select>
                </div>
            </div>
            <div class="col-md-12">
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
                        <option value="America/Mexico_City">(GMT-06:00) Guadalajara, Mexico City, Monterrey</option>
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
                        <option value="America/Argentina/Buenos_Aires">(GMT-03:00) Buenos Aires, Georgetown</option>
                        <option value="America/Godthab">(GMT-03:00) Greenland</option>
                        <option value="America/Montevideo">(GMT-03:00) Montevideo</option>
                        <option value="America/Noronha">(GMT-02:00) Mid-Atlantic</option>
                        <option value="Atlantic/Cape_Verde">(GMT-01:00) Cape Verde Is.</option>
                        <option value="Atlantic/Azores">(GMT-01:00) Azores</option>
                        <option value="Africa/Casablanca">(GMT+00:00) Casablanca, Monrovia, Reykjavik</option>
                        <option value="Etc/Greenwich">(GMT+00:00) Greenwich Mean Time : Dublin, Edinburgh, Lisbon,
                            London</option>
                        <option value="Europe/Amsterdam">(GMT+01:00) Amsterdam, Berlin, Bern, Rome, Stockholm, Vienna
                        </option>
                        <option value="Europe/Belgrade">(GMT+01:00) Belgrade, Bratislava, Budapest, Ljubljana, Prague
                        </option>
                        <option value="Europe/Brussels">(GMT+01:00) Brussels, Copenhagen, Madrid, Paris</option>
                        <option value="Europe/Sarajevo">(GMT+01:00) Sarajevo, Skopje, Warsaw, Zagreb</option>
                        <option value="Africa/Lagos">(GMT+01:00) West Central Africa</option>
                        <option value="Asia/Amman">(GMT+02:00) Amman</option>
                        <option value="Europe/Athens">(GMT+02:00) Athens, Bucharest, Istanbul</option>
                        <option value="Asia/Beirut">(GMT+02:00) Beirut</option>
                        <option value="Africa/Cairo">(GMT+02:00) Cairo</option>
                        <option value="Africa/Harare">(GMT+02:00) Harare, Pretoria</option>
                        <option value="Europe/Helsinki">(GMT+02:00) Helsinki, Kyiv, Riga, Sofia, Tallinn, Vilnius
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
                        <option value="Asia/Hong_Kong">(GMT+08:00) Beijing, Chongqing, Hong Kong, Urumqi</option>
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
            <div class="col-md-12">
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

            <div class="col-md-12">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Default Date Range</label>
                    <select class="form-select" name="range" aria-label="Default select example">
                        <option value="">Select Date Range</option>
                        <option value="1D">1D</option>
                        <option value="5D">5D</option>
                        <option value="1M">1M</option>
                        <option value="3M">3M</option>
                        <option value="6M">6M</option>
                        <option value="YTD">YTD</option>
                        <option value="12M">1Y</option>
                        <option value="60M">5Y</option>
                        <option value="ALL">ALL</option>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Width</label>
                    <input type="number" class="form-control" name="width" aria-label="Default select example"
                        value="1200">
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Height</label>
                    <input type="number" class="form-control" name="height" aria-label="Default select example"
                        value="800">
                </div>
            </div>
            <div class="col-md-12 pl-4">
                <div class="mb-3 ">
                    <input name="hide_top_toolbar" class="form-check-input" type="checkbox" value="1"
                        id="hide_top_toolbar">
                    <label class="form-check-label" for="hide_top_toolbar">
                        Show top toolbar
                    </label>
                </div>
            </div>
            <div class="col-md-12 pl-4">
                <div class="mb-3">
                    <input name="withdateranges" class="form-check-input" type="checkbox" value="1"
                        id="withdateranges">
                    <label class="form-check-label" for="withdateranges">
                        Show bottom toolbar
                    </label>
                </div>
            </div>
            <div class="col-md-12 pl-4">
                <div class="mb-3">
                    <input name="hide_side_toolbar" class="form-check-input" type="checkbox" value="1"
                        id="hide_side_toolbar">
                    <label class="form-check-label" for="hide_side_toolbar">
                        Show drawing toolbar
                    </label>
                </div>
            </div>

            <div class="col-md-12 pl-4">
                <div class="mb-3">
                    <input name="details" class="form-check-input" type="checkbox" value="1" id="details">
                    <label class="form-check-label" for="details">
                        Show Details
                    </label>
                </div>
            </div>

            <div class="col-md-12 pl-4">
                <div class="mb-3">
                    <input name="calendar" class="form-check-input" type="checkbox" value="1" id="calendar">
                    <label class="form-check-label" for="calendar">
                        Show calendar
                    </label>
                </div>
            </div>
            <div class="col-md-12 pl-4">
                <div class="mb-3">
                    <input name="hotlist" class="form-check-input" type="checkbox" value="1" id="hotlist">
                    <label class="form-check-label" for="hotlist">
                        Show hotlist
                    </label>
                </div>
            </div>
            <div class="col-md-12 pl-4">
                <div class="mb-3">
                    <input name="enable_publishing" class="form-check-input" type="checkbox" value="1"
                        id="enable_publishing" value="1">
                    <label class="form-check-label" for="enable_publishing">
                        Show enable publishing
                    </label>
                </div>
            </div>
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Apply</button>
        </div>
    </form>
</div>
