@extends('layouts.app')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="m-2">
        <div class="d-flex justify-content-between ">
            <div>

                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#layoutSeting">
                    Change Layout Setting
                </button>

                <div class="modal fade" id="layoutSeting" tabindex="-1" aria-labelledby="layoutSetingLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="layoutSetingLabel">Change Layout Setting</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="justify-content-center">
                                    <div class="row justify-content-center">
                                        @foreach ($tradingLayouts as $tradingLayout)
                                            <div class="col-md-6 p-4">
                                                <div class="card box" style="height: 15rem;">
                                                    <div class="card-header text-capitalize d-flex justify-content-between">
                                                        <div>{{ $tradingLayout->name }}</div>

                                                        {{-- <div class="ml-auto">
                                                            <a href="{{ route('layout-settings.create', $tradingLayout) }}">
                                                                Edit 
                                                            </a>
                                                        </div> --}}

                                                    </div>
                                                    <a href="{{ route('layout-settings.create', $tradingLayout) }}">
                                                        <div class="card-body">
                                                            <table class="table table-bordered border border-primary">
                                                                @if ($tradingLayout->id == 1)
                                                                    <tr>
                                                                        <td class="text-center py-3">View 1</td>
                                                                    </tr>
                                                                @endif

                                                                @if ($tradingLayout->id == 2)
                                                                    <tr>
                                                                        <td class="text-center py-3">View 1</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-center py-3">View 2</td>
                                                                    </tr>
                                                                @endif
                                                                @if ($tradingLayout->id == 3)
                                                                    <tr>
                                                                        <td colspan="2" class="text-center py-3">View 1
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-center py-3">
                                                                            View 2
                                                                        </td>
                                                                        <td class="text-center py-3">
                                                                            View 3
                                                                        </td>
                                                                    </tr>
                                                                @endif

                                                                @if ($tradingLayout->id == 4)
                                                                    <tr>
                                                                        <td colspan="3" class="text-center py-3">View 1
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-center py-3">
                                                                            View 2
                                                                        </td>
                                                                        <td class="text-center py-3">
                                                                            View 3
                                                                        </td>
                                                                        <td class="text-center py-3">
                                                                            View 4
                                                                        </td>
                                                                    </tr>
                                                                @endif

                                                            </table>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div><!-- /.col -->
            <div>
                <h4 class="my-2">
                    {{ $title = 'Layout Setting' }}
                </h4>
            </div>
            <div class="ml-auto">
                <div class="text-right">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Change Layout View Setting
                    </button>
                </div>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Change Layout Setting</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="justify-content-center">
                                <div>
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
                                                <select id="form-select-{{ $layoutView->id }}"
                                                    name="{{ $layoutView->name }}" class="form-select form-select-lg mb-3"
                                                    aria-label=".form-select-lg example">
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
                        </div>
                        {{-- <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div><!-- /.col -->
    </div><!-- /.row -->
    @php
        $view_name = '';
        $i = 1;
    @endphp

    <div class="row justify-content-center">
        @if ($layoutSetting)
            @if ($layoutSetting->trading_layout_id == 1)
                @foreach ($tradingSettings as $tradingSetting)
                    @if ($layoutSetting->View_1 == $tradingSetting->id)
                        <div class="col-md-12">
                            <!-- TradingView Widget BEGIN -->
                            <div class="tradingview-widget-container table-responsive">
                                <div id="tradingview_{{ $i ?? '00' }}"></div>
                            </div>
                            <!-- TradingView Widget END -->
                        </div>
                        @include('backend.layout-setting.scripts')
                        @php
                            $i++;
                        @endphp
                    @endif
                @endforeach
            @endif
            @if ($layoutSetting->trading_layout_id == 2)
                @foreach ($tradingSettings as $tradingSetting)
                    @if ($layoutSetting->View_1 == $tradingSetting->id)
                        <div class="col-md-6">
                            <!-- TradingView Widget BEGIN -->
                            <div class="tradingview-widget-container table-responsive">
                                <div id="tradingview_{{ $i ?? '00' }}"></div>
                            </div>
                            <!-- TradingView Widget END -->
                        </div>
                        @include('backend.layout-setting.scripts')
                        @php
                            $i++;
                        @endphp
                    @endif
                    @if ($layoutSetting->View_2 == $tradingSetting->id)
                        <div class="col-md-6">
                            <!-- TradingView Widget BEGIN -->
                            <div class="tradingview-widget-container table-responsive">
                                <div id="tradingview_{{ $i ?? '00' }}"></div>
                            </div>
                            <!-- TradingView Widget END -->
                        </div>
                        @include('backend.layout-setting.scripts')
                        @php
                            $i++;
                        @endphp
                    @endif
                @endforeach
            @endif
            @if ($layoutSetting->trading_layout_id == 3)
                @foreach ($tradingSettings as $tradingSetting)
                    @if ($layoutSetting->View_1 == $tradingSetting->id)
                        <div class="col-md-12">
                            <!-- TradingView Widget BEGIN -->
                            <div class="tradingview-widget-container table-responsive">
                                <div id="tradingview_{{ $i ?? '00' }}"></div>
                            </div>
                            <!-- TradingView Widget END -->
                        </div>
                        @include('backend.layout-setting.scripts')
                        @php
                            $i++;
                        @endphp
                    @endif
                @endforeach
                @foreach ($tradingSettings as $tradingSetting)
                    @if ($layoutSetting->View_2 == $tradingSetting->id)
                        <div class="col-md-6">
                            <!-- TradingView Widget BEGIN -->
                            <div class="tradingview-widget-container table-responsive">
                                <div id="tradingview_{{ $i ?? '00' }}"></div>
                            </div>
                            <!-- TradingView Widget END -->
                        </div>
                        @include('backend.layout-setting.scripts')
                        @php
                            $i++;
                        @endphp
                    @endif
                    @if ($layoutSetting->View_3 == $tradingSetting->id)
                        <div class="col-md-6">
                            <!-- TradingView Widget BEGIN -->
                            <div class="tradingview-widget-container table-responsive">
                                <div id="tradingview_{{ $i ?? '00' }}"></div>
                            </div>
                            <!-- TradingView Widget END -->
                        </div>
                        @include('backend.layout-setting.scripts')
                        @php
                            $i++;
                        @endphp
                    @endif
                @endforeach
            @endif
            @if ($layoutSetting->trading_layout_id == 4)
                @foreach ($tradingSettings as $tradingSetting)
                    @if ($layoutSetting->View_1 == $tradingSetting->id)
                        <div class="col-md-6">
                            <!-- TradingView Widget BEGIN -->
                            <div class="tradingview-widget-container table-responsive">
                                <div id="tradingview_{{ $i ?? '00' }}"></div>
                            </div>
                            <!-- TradingView Widget END -->
                            @include('backend.layout-setting.scripts')
                        </div>
                        @php
                            $i++;
                        @endphp
                    @endif
                    @if ($layoutSetting->View_2 == $tradingSetting->id)
                        <div class="col-md-6">
                            <!-- TradingView Widget BEGIN -->
                            <div class="tradingview-widget-container table-responsive">
                                <div id="tradingview_{{ $i ?? '00' }}"></div>
                            </div>
                            <!-- TradingView Widget END -->
                            @include('backend.layout-setting.scripts')
                        </div>
                        @php
                            $i++;
                        @endphp
                    @endif
                    @if ($layoutSetting->View_3 == $tradingSetting->id)
                        <div class="col-md-6">
                            <!-- TradingView Widget BEGIN -->
                            <div class="tradingview-widget-container table-responsive">
                                <div id="tradingview_{{ $i ?? '00' }}"></div>
                            </div>
                            <!-- TradingView Widget END -->
                            @include('backend.layout-setting.scripts')
                        </div>
                        @php
                            $i++;
                        @endphp
                    @endif
                    @if ($layoutSetting->View_4 == $tradingSetting->id)
                        <div class="col-md-6">
                            <!-- TradingView Widget BEGIN -->
                            <div class="tradingview-widget-container table-responsive">
                                <div id="tradingview_{{ $i ?? '00' }}"></div>
                            </div>
                            <!-- TradingView Widget END -->
                            @include('backend.layout-setting.scripts')
                        </div>
                        @php
                            $i++;
                        @endphp
                    @endif
                @endforeach
            @endif
        @endif
    </div>
@endsection
