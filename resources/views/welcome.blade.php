@extends('layouts.app')

@section('content')
    <div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 py-5">
                    <div class="fs-1 py-4 text-center">Trading View Chart</div>
                    <!-- TradingView Widget BEGIN -->
                    <div class="tradingview-widget-container">
                        <div id="tradingview_72c60"></div>
                        <script type="text/javascript" src="https://s3.tradingview.com/tv.js"></script>
                        <script type="text/javascript">
                            new TradingView.widget({
                                "width": 1400,
                                "height": 750,
                                "symbol": "NASDAQ:AAPL",
                                "interval": "D",
                                "timezone": "Asia/Kathmandu",
                                "theme": "light",
                                "style": "1",
                                "locale": "en",
                                "toolbar_bg": "#f1f3f6",
                                "enable_publishing": false,
                                "withdateranges": true,
                                "hide_side_toolbar": false,
                                "allow_symbol_change": true,
                                "container_id": "tradingview_72c60"
                            });
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-success text-white" id="about">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12" style="padding-top: 100px; padding-bottom: 80px;">
                    <div class="fs-1 fs-bold p-4 text-center">WHAT IS SMICAJ?</div>
                    <p class="fs-2">
                        SMICAJ is a sophisticated AI-based algorithm that aims to predict the trend of the stock market. It
                        is a
                        tool that facilities a trader to make appropriate decisions without having to do any technical and
                        fundamental research. SMICAJ guarantees a novice user a safe landing in this unpredictable
                        environment
                        of rumor filled share market. It saves a lot of analysis time regarding the rise and fall of the
                        share
                        value. With a single click, you can view all the past trends and future expectations regarding the
                        share
                        value of your interest. Moreover, it generates a signal (SMS, email, notifications) that predicts
                        the
                        perfect time to buy, hold or sell your stocks for your maximum profit.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div id="services">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12" style="padding-top: 100px; padding-bottom: 80px;">
                    <div class="fs-1 fs-bold p-4 text-center">Our Services</div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card text-bg-success" style="height: 20rem;">
                                <div class="card-header fs-2">Data Analysis</div>
                                <div class="card-body text-center">
                                    <p class="card-text fs-5">SMICAJ Data Analytics Is A Revolutionary Product That Combines
                                        Fundamental Analysis, Technical Analysis, And Floorsheet Analysis To Give Investors
                                        A Detailed Insight Into A Stock, Which Will Ultimately Help Investors Make Better
                                        BUY | SELL Decisions.</p>
                                    <a href="#" class="btn btn-primary">More..</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card text-bg-success" style="height: 20rem;">
                                <div class="card-header fs-2">Technical Data</div>
                                <div class="card-body text-center">
                                    <p class="card-text fs-5"> MetaStock Contains Powerful Technical Analysis Tools To Help
                                        You Make Informed
                                        Decisions About What To Buy And Sell And When To Execute To Make The Most Profita
                                    </p>
                                    <a href="#" class="btn btn-primary">More..</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card text-bg-success" style="height: 20rem;">
                                <div class="card-header fs-2">Portfolio</div>
                                <div class="card-body text-center">
                                    <p class="card-text fs-5"> Online Utility That Helps To Track All Investments And Make
                                        Investors Aware Of Their Gains And Losses.</p>
                                    <a href="#" class="btn btn-primary">More..</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="ftco-section" id="contact-us">
        <div class="container" style="padding-top: 100px; padding-bottom: 80px;">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center mb-5">
                    <div class="fs-1">Contact Us</div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-12 bg-white shadow-sm">
                    <div class="wrapper">
                        <div class="row no-gutters">
                            <div class="col-lg-8 col-md-7 order-md-last d-flex align-items-stretch">
                                <div class="contact-wrap w-100 py-3 px-md-5 px-4">
                                    <h3 class="mb-4">Get in touch</h3>
                                    <div id="form-message-warning" class="mb-4"></div>
                                    <livewire:contact-form />
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-5 d-flex align-items-stretch">
                                <div class="info-wrap text-bg-success w-100 p-md-5 p-4">
                                    <h3>Let's get in touch</h3>
                                    <p class="mb-4">We're open for any suggestion or just to have a chat</p>
                                    <div class="dbox w-100 d-flex align-items-start">
                                        <div class="icon d-flex align-items-center justify-content-center">
                                            <span class="fa fa-map-marker"></span>
                                        </div>
                                        <div class="text pl-3">
                                            <p><span>Address:</span> Dhangadhi, Kailali, Nepal
                                            </p>
                                        </div>
                                    </div>
                                    <div class="dbox w-100 d-flex align-items-center">
                                        <div class="icon d-flex align-items-center justify-content-center">
                                            <span class="fa fa-phone"></span>
                                        </div>
                                        <div class="text pl-3">
                                            <p><span>Phone:</span> <a href="tel://+977-9847507885"
                                                    class="text-white btn">+977-9847507885</a></p>
                                        </div>
                                    </div>
                                    <div class="dbox w-100 d-flex align-items-center">
                                        <div class="icon d-flex align-items-center justify-content-center">
                                            <span class="fa fa-paper-plane"></span>
                                        </div>
                                        <div class="text pl-3">
                                            <p><span>Email:</span> <a href="info@smicaj.com"><span
                                                        class="text-white btn">info@smicaj.com</span></a>
                                            </p>
                                        </div>
                                    </div>
                                    <div>
                                        <span>
                                            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                                                width="48" height="48" viewBox="0 0 48 48">
                                                <path fill="#039be5" d="M24 5A19 19 0 1 0 24 43A19 19 0 1 0 24 5Z"></path>
                                                <path fill="#fff"
                                                    d="M26.572,29.036h4.917l0.772-4.995h-5.69v-2.73c0-2.075,0.678-3.915,2.619-3.915h3.119v-4.359c-0.548-0.074-1.707-0.236-3.897-0.236c-4.573,0-7.254,2.415-7.254,7.917v3.323h-4.701v4.995h4.701v13.729C22.089,42.905,23.032,43,24,43c0.875,0,1.729-0.08,2.572-0.194V29.036z">
                                                </path>
                                            </svg>
                                        </span>
                                        <span>
                                            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                                                width="48" height="48" viewBox="0 0 48 48">
                                                <path fill="#fff"
                                                    d="M4.868,43.303l2.694-9.835C5.9,30.59,5.026,27.324,5.027,23.979C5.032,13.514,13.548,5,24.014,5c5.079,0.002,9.845,1.979,13.43,5.566c3.584,3.588,5.558,8.356,5.556,13.428c-0.004,10.465-8.522,18.98-18.986,18.98c-0.001,0,0,0,0,0h-0.008c-3.177-0.001-6.3-0.798-9.073-2.311L4.868,43.303z">
                                                </path>
                                                <path fill="#fff"
                                                    d="M4.868,43.803c-0.132,0-0.26-0.052-0.355-0.148c-0.125-0.127-0.174-0.312-0.127-0.483l2.639-9.636c-1.636-2.906-2.499-6.206-2.497-9.556C4.532,13.238,13.273,4.5,24.014,4.5c5.21,0.002,10.105,2.031,13.784,5.713c3.679,3.683,5.704,8.577,5.702,13.781c-0.004,10.741-8.746,19.48-19.486,19.48c-3.189-0.001-6.344-0.788-9.144-2.277l-9.875,2.589C4.953,43.798,4.911,43.803,4.868,43.803z">
                                                </path>
                                                <path fill="#cfd8dc"
                                                    d="M24.014,5c5.079,0.002,9.845,1.979,13.43,5.566c3.584,3.588,5.558,8.356,5.556,13.428c-0.004,10.465-8.522,18.98-18.986,18.98h-0.008c-3.177-0.001-6.3-0.798-9.073-2.311L4.868,43.303l2.694-9.835C5.9,30.59,5.026,27.324,5.027,23.979C5.032,13.514,13.548,5,24.014,5 M24.014,42.974C24.014,42.974,24.014,42.974,24.014,42.974C24.014,42.974,24.014,42.974,24.014,42.974 M24.014,42.974C24.014,42.974,24.014,42.974,24.014,42.974C24.014,42.974,24.014,42.974,24.014,42.974 M24.014,4C24.014,4,24.014,4,24.014,4C12.998,4,4.032,12.962,4.027,23.979c-0.001,3.367,0.849,6.685,2.461,9.622l-2.585,9.439c-0.094,0.345,0.002,0.713,0.254,0.967c0.19,0.192,0.447,0.297,0.711,0.297c0.085,0,0.17-0.011,0.254-0.033l9.687-2.54c2.828,1.468,5.998,2.243,9.197,2.244c11.024,0,19.99-8.963,19.995-19.98c0.002-5.339-2.075-10.359-5.848-14.135C34.378,6.083,29.357,4.002,24.014,4L24.014,4z">
                                                </path>
                                                <path fill="#40c351"
                                                    d="M35.176,12.832c-2.98-2.982-6.941-4.625-11.157-4.626c-8.704,0-15.783,7.076-15.787,15.774c-0.001,2.981,0.833,5.883,2.413,8.396l0.376,0.597l-1.595,5.821l5.973-1.566l0.577,0.342c2.422,1.438,5.2,2.198,8.032,2.199h0.006c8.698,0,15.777-7.077,15.78-15.776C39.795,19.778,38.156,15.814,35.176,12.832z">
                                                </path>
                                                <path fill="#fff" fill-rule="evenodd"
                                                    d="M19.268,16.045c-0.355-0.79-0.729-0.806-1.068-0.82c-0.277-0.012-0.593-0.011-0.909-0.011c-0.316,0-0.83,0.119-1.265,0.594c-0.435,0.475-1.661,1.622-1.661,3.956c0,2.334,1.7,4.59,1.937,4.906c0.237,0.316,3.282,5.259,8.104,7.161c4.007,1.58,4.823,1.266,5.693,1.187c0.87-0.079,2.807-1.147,3.202-2.255c0.395-1.108,0.395-2.057,0.277-2.255c-0.119-0.198-0.435-0.316-0.909-0.554s-2.807-1.385-3.242-1.543c-0.435-0.158-0.751-0.237-1.068,0.238c-0.316,0.474-1.225,1.543-1.502,1.859c-0.277,0.317-0.554,0.357-1.028,0.119c-0.474-0.238-2.002-0.738-3.815-2.354c-1.41-1.257-2.362-2.81-2.639-3.285c-0.277-0.474-0.03-0.731,0.208-0.968c0.213-0.213,0.474-0.554,0.712-0.831c0.237-0.277,0.316-0.475,0.474-0.791c0.158-0.317,0.079-0.594-0.04-0.831C20.612,19.329,19.69,16.983,19.268,16.045z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
