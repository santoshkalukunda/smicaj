@extends('backend.app')7
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
    <div class="row justify-content-center">
        <div class="col-md-6 p-4 bg-white">
            <form action="{{ route('layout-settings.store', $tradingLayout) }}" method="post">
                @csrf
                <div class="mb-3">
                    @foreach ($layoutViews as $layoutView)
                        <label for="formFileLg" class="form-label">{{ $layoutView->name }}</label>
                        <select id="form-select-{{ $layoutView->id }}" name="{{ $layoutView->name }}"
                            class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                            <option>Open this select menu</option>
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
@endsection
