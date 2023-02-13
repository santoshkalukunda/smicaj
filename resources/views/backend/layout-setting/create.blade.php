@extends('backend.app')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="row py-2">
        <div class="col-sm-6">
            <h4 class="my-2"> {{ $title = 'Layout Setting Create' }} </h3>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('trading-settings.index') }}"> <i
                            class="bi bi-arrow-clockwise"></i> Go Back</a></li>
            </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
    @php
        $view_name = '';
    @endphp
    <div class="row justify-content-center">
        <div class="col-md-6 p-4 bg-white">
            <form
                action="{{ $layoutSetting ? route('layout-settings.update', $layoutSetting) : route('layout-settings.store', $tradingLayout) }}"
                method="post">
                @if ($layoutSetting)
                    @method('put')
                @endif

                @csrf
                <div class="mb-3">
                    @foreach ($layoutViews as $layoutView)
                        @if ($layoutSetting)
                            @php
                                if ($layoutView->name == 'View 1') {
                                    $view_name = 'View_1';
                                } elseif ($layoutView->name == 'View 2') {
                                    $view_name = 'View_2';
                                } elseif ($layoutView->name == 'View 3') {
                                    $view_name = 'View_3';
                                } else {
                                    $view_name = 'View_4';
                                }
                                
                            @endphp
                        @endif
                        <label for="formFileLg" class="form-label">{{ $layoutView->name }}</label>
                        <select id="form-select-{{ $layoutView->id }}" name="{{ $layoutView->name }}"
                            class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                            <option>Open this select menu</option>
                            @if ($layoutSetting)
                                @foreach ($tradingSettings as $tradingSetting)
                                    <option value="{{ $tradingSetting->id }}"
                                        {{ $layoutSetting->$view_name == $tradingSetting->id ? 'selected' : '' }}>
                                        <span>{{ $tradingSetting->name }}
                                            |
                                            {{ $tradingSetting->trading }}
                                            |
                                            {{ $tradingSetting->trading_time }}
                                            |
                                            {{ $tradingSetting->buy_sell == true ? 'Buy' : 'Sell' }}
                                        </span>
                                    </option>
                                @endforeach
                            @else
                                @foreach ($tradingSettings as $tradingSetting)
                                    <option value="{{ $tradingSetting->id }}">
                                        <span>{{ $tradingSetting->name }}
                                            |
                                            {{ $tradingSetting->trading }}
                                            |
                                            {{ $tradingSetting->trading_time }}
                                            |
                                            {{ $tradingSetting->buy_sell == true ? 'Buy' : 'Sell' }}
                                        </span>
                                    </option>
                                @endforeach
                            @endif
                        </select>
                        @push('scripts')
                            <script>
                                $('#form-select-{{ $layoutView->id }}').select2({
                                    theme: 'bootstrap4',
                                    placeholder: "Add Indicatores",
                                });
                            </script>
                        @endpush
                    @endforeach
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary form-control">Save</button>
                </div>

            </form>
        </div>
    </div>
    <div class="row justify-content-center">
        @if ($layoutSetting)
            @if ($layoutSetting->trading_layout_id == 1)
                @foreach ($tradingSettings as $tradingSetting)
                    @if ($layoutSetting->View_1 == $tradingSetting->id)
                        <div class="col-md-12">
                            <!-- TradingView Widget BEGIN -->
                            <div class="tradingview-widget-container table-responsive">
                                <div id="tradingview_{{ $tradingSetting->id ?? '00' }}"></div>
                            </div>
                            <!-- TradingView Widget END -->
                        </div>
                        @include('backend.trading-setting.scripts')
                    @endif
                @endforeach
            @endif
            @if ($layoutSetting->trading_layout_id == 2)
                @foreach ($tradingSettings as $tradingSetting)
                    @if ($layoutSetting->View_1 == $tradingSetting->id)
                        <div class="col-md-12">
                            <!-- TradingView Widget BEGIN -->
                            <div class="tradingview-widget-container table-responsive">
                                <div id="tradingview_{{ $tradingSetting->id ?? '00' }}"></div>
                            </div>
                            <!-- TradingView Widget END -->
                        </div>
                        @include('backend.trading-setting.scripts')
                    @endif
                    @if ($layoutSetting->View_2 == $tradingSetting->id)
                        <div class="col-md-12">
                            <!-- TradingView Widget BEGIN -->
                            <div class="tradingview-widget-container table-responsive">
                                <div id="tradingview_{{ $tradingSetting->id ?? '00' }}"></div>
                            </div>
                            <!-- TradingView Widget END -->
                        </div>
                        @include('backend.trading-setting.scripts')
                    @endif
                @endforeach
            @endif
            @if ($layoutSetting->trading_layout_id == 3)
                @foreach ($tradingSettings as $tradingSetting)
                    @if ($layoutSetting->View_1 == $tradingSetting->id)
                        <div class="col-md-12">
                            <!-- TradingView Widget BEGIN -->
                            <div class="tradingview-widget-container table-responsive">
                                <div id="tradingview_{{ $tradingSetting->id ?? '00' }}"></div>
                            </div>
                            <!-- TradingView Widget END -->
                        </div>
                        @include('backend.trading-setting.scripts')
                    @endif
                    @if ($layoutSetting->View_2 == $tradingSetting->id)
                        <div class="col-md-6">
                            <!-- TradingView Widget BEGIN -->
                            <div class="tradingview-widget-container table-responsive">
                                <div id="tradingview_{{ $tradingSetting->id ?? '00' }}"></div>
                            </div>
                            <!-- TradingView Widget END -->
                        </div>
                        @include('backend.trading-setting.scripts')
                    @endif
                    @if ($layoutSetting->View_3 == $tradingSetting->id)
                        <div class="col-md-6">
                            <!-- TradingView Widget BEGIN -->
                            <div class="tradingview-widget-container table-responsive">
                                <div id="tradingview_{{ $tradingSetting->id ?? '00' }}"></div>
                            </div>
                            <!-- TradingView Widget END -->
                        </div>
                        @include('backend.trading-setting.scripts')
                    @endif
                @endforeach
            @endif
            @if ($layoutSetting->trading_layout_id == 4)
                @foreach ($tradingSettings as $tradingSetting)
                    <div class="row">

                        <div class="col-md-12">
                            @if ($layoutSetting->View_1 == $tradingSetting->id)
                                <!-- TradingView Widget BEGIN -->
                                <div class="tradingview-widget-container table-responsive">
                                    <div id="tradingview_{{ $tradingSetting->id ?? '00' }}"></div>
                                </div>
                                <!-- TradingView Widget END -->
                                @include('backend.trading-setting.scripts')
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            @if ($layoutSetting->View_2 == $tradingSetting->id)
                                <!-- TradingView Widget BEGIN -->
                                <div class="tradingview-widget-container table-responsive">
                                    <div id="tradingview_{{ $tradingSetting->id ?? '00' }}"></div>
                                </div>
                                <!-- TradingView Widget END -->
                                @include('backend.trading-setting.scripts')
                            @endif
                        </div>

                        <div class="col-md-4">
                            @if ($layoutSetting->View_3 == $tradingSetting->id)
                                <!-- TradingView Widget BEGIN -->
                                <div class="tradingview-widget-container table-responsive">
                                    <div id="tradingview_{{ $tradingSetting->id ?? '00' }}"></div>
                                </div>
                                <!-- TradingView Widget END -->
                                @include('backend.trading-setting.scripts')
                            @endif
                        </div>
                        <div class="col-md-4">
                            @if ($layoutSetting->View_4 == $tradingSetting->id)
                                <!-- TradingView Widget BEGIN -->
                                <div class="tradingview-widget-container table-responsive">
                                    <div id="tradingview_{{ $tradingSetting->id ?? '00' }}"></div>
                                </div>
                                <!-- TradingView Widget END -->
                                @include('backend.trading-setting.scripts')
                            @endif
                        </div>
                    </div>
                @endforeach
            @endif
        @endif
    </div>
@endsection
