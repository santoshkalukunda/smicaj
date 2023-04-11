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

                    <label for="stock" class="form-label">Stock Setting</label>
                    <select class="form-select" name="stock_id" aria-label="Default select example">
                        @foreach ($stocks as $stock)
                            <option value="{{ $stock->id }}">
                                {{ $stock->name }}</option>
                        @endforeach
                    </select>

                </div>
                <div class="col-md-2">
                    <label class="form-label">Symbol</label>
                    <select class="form-select" name="symbol">
                        <option value="BTCUSDT">BTCUSDT</option>
                        <option value="LTCBTC">LTCBTC</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <label class="form-label">Intraval</label>
                    <select class="form-select " name="interval">
                        <option value="1s">1S</option>
                        <option value="1m">1M</option>
                        <option value="1d">1D</option>
                    </select>
                </div>
                <div class="col-md-2 mt-4 pt-2">
                    <button type="submit" class="btn btn-primary">Search</button>
                </div>
            </div>
        </form>
    </div>
@endsection
