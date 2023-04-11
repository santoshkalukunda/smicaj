@extends('backend.app')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="row py-2">
        <div class="col-sm-6">
            <h4 class="my-2"> {{ $title = 'Setting Create' }} </h3>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('stocks.create') }}"> <i
                            class="bi bi-file-earmark-plus"></i>Create</a></li>
            </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
    <div class="tab-content p-0  table-responsive">
        <table class="table table-md table-bordered">
            <tr>
                {{-- <th>SN</th> --}}
                <th rowspan="2">ID</th>
                <th rowspan="2">Name</th>
                <th rowspan="2">Trading</th>
                <th rowspan="2">Trading Time</th>
                <th rowspan="2">Buy/Sell</th>
                <th colspan="11">MACD</th>
                <th colspan="5">RSI</th>
                <th colspan="5">EMA</th>
                <th colspan="5">SMA</th>
                <th rowspan="2">Action</th>
            </tr>
            <tr>
                <th>Enable</th>
                <th>Source</th>
                <th>Fast_length</th>
                <th>Fast_width</th>
                <th>Fast_line_color</th>
                <th>Slow_length</th>
                <th>Slow_width</th>
                <th>Slow_line_color</th>
                <th>Histogram</th>
                <th>Histogram_up_color</th>
                <th>Histogram_down_color</th>
                <th>Enable</th>
                <th>Source</th>
                <th>Length</th>
                <th>Width</th>
                <th>Color</th>
                <th>Enable</th>
                <th>Source</th>
                <th>Length</th>
                <th>Width</th>
                <th>Color</th>
                <th>Enable</th>
                <th>Source</th>
                <th>Length</th>
                <th>Width</th>
                <th>Color</th>
            </tr>
            @forelse ($stocks as $stock)
                <tr>
                    <td><a href="{{ route('stocks.edit', $stock) }}">{{ $stock->id }}</a>
                    </td>
                    <td>{{ $stock->name }}</td>
                    <td>{{ $stock->trading }}</td>
                    <td>{{ $stock->trading_time }}</td>
                    <td>
                        <div class=" text-center {{ $stock->buy_sell == true ? 'bg-primary' : 'bg-success' }}">
                            {{ $stock->buy_sell == true ? 'Buy' : 'Sell' }}</div>
                    </td>
                    <td>{{ $stock->macd_enable  == true ? "True" : "False" }}</td>
                    <td>{{ $stock->macd_source }}</td>
                    <td>{{ $stock->macd_fast_length }}</td>
                    <td>{{ $stock->macd_fast_width }}</td>
                    <td><div class="p-2" style="background-color: {{ $stock->macd_fast_line_color }}"></div></td>
                    <td>{{ $stock->macd_slow_length }}</td>
                    <td>{{ $stock->macd_slow_width }}</td>
                    <td><div class="p-2" style="background-color: {{ $stock->macd_slow_line_color }}"></div></td>
                    <td>{{ $stock->macd_histogram }}</td>
                    <td><div class="p-2" style="background-color: {{ $stock->macd_histogram_up_color }}"></div></td>
                    <td><div class="p-2" style="background-color: {{ $stock->histogram_down_color }}"></div></td>
                    <td>{{ $stock->rsi_enable == true ? "True" : "False" }}</td>
                    <td>{{ $stock->rsi_source }}</td>
                    <td>{{ $stock->rsi_length }}</td>
                    <td>{{ $stock->rsi_width }}</td>
                    <td><div class="p-2" style="background-color: {{ $stock->rsi_color }}"></div></td>
                    <td>{{ $stock->ema_enable  == true ? "True" : "False" }}</td>
                    <td>{{ $stock->ema_source }}</td>
                    <td>{{ $stock->ema_length }}</td>
                    <td>{{ $stock->ema_width }}</td>
                    <td><div class="p-2" style="background-color: {{ $stock->ema_color }}"></div></td>
                    <td>{{ $stock->sma_enable  == true ? "True" : "False" }}</td>
                    <td>{{ $stock->sma_source }}</td>
                    <td>{{ $stock->sma_length }}</td>
                    <td>{{ $stock->sma_width }}</td>
                    <td><div class="p-2" style="background-color: {{ $stock->sma_color }}"></div></td>
                    <td>
                        <div class="">
                            <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                <li><a class="dropdown-item text-center btn"
                                        href="{{ route('stocks.edit', $stock) }}">Edit</a>
                                </li>
                                <li>
                                    <form action="{{ route('stocks.destroy', $stock) }}" method="post">
                                        @method('delete')
                                        @csrf
                                        <button class="dropdown-item text-center btn form-control" type="submit"
                                            onclick="return confirm('Are you sure to delete?')">
                                            Delete
                                        </button>
                                    </form>
                                </li>

                            </ul>
                        </div>
                    </td>
                </tr>

            @empty
                <tr>
                    <td colspan="32">
                        <div class="text-danger  text-center"><i>!! No, Recored Found !!</i></div>
                    </td>
                </tr>
            @endforelse
        </table>
    </div>
@endsection
