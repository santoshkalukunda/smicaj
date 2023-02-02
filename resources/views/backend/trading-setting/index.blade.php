@extends('backend.app')
@section('content')
    <!-- Content Header (tradingSetting header) -->
    <div class="row py-2">
        <div class="col-sm-6">
            <h3> {{ $title = 'Trading Setting' }} </h3>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('trading-settings.create') }}"><i class="bi bi-plus-lg"></i>
                        Create New Setting</a></li>
            </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
    <div class="my-2 p-2 bg-white ">
       <x-trading-setting-filter />
    </div>
    <div class="row">
        <!-- Left col -->
        <section class="col-lg-12 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-chart-pie mr-1"></i>
                        {{ $title }}
                    </h3>
                </div><!-- /.card-header -->
                <div class="card-body">

                    <div class="tab-content p-0  table-responsive">
                        <table class="table table-md table-bordered">
                            <tr>
                                {{-- <th>SN</th> --}}
                                <th>ID</th>
                                <th>Trading</th>
                                <th>Trading Time</th>
                                <th>Buy/Sell</th>
                                <th>Intraval</th>
                                <th>Style</th>
                                <th>Theme</th>
                                <th>Timezone</th>
                                <th>Locale</th>
                                <th>Range</th>
                                <th>Width</th>
                                <th>Height</th>
                                <th>Show Top Toolbar</th>
                                <th>With Date Ranges</th>
                                <th>Show Side Toolbar</th>
                                <th>Details</th>
                                <th>Calendar</th>
                                <th>Hotlist</th>
                                <th>Enable Publishing</th>
                                <th>User Name</th>
                                <th>Action</th>
                            </tr>
                            @forelse ($tradingSettings as $tradingSetting)
                                <tr>
                                    {{-- <td>{{ $loop->iteration }}</td> --}}
                                    <td><a
                                            href="{{ route('trading-settings.edit', $tradingSetting) }}">{{ $tradingSetting->id }}</a>
                                    </td>
                                    <td>{{ $tradingSetting->trading }}</td>
                                    <td>{{ $tradingSetting->trading_time }}</td>
                                    <td>
                                        <div
                                            class=" text-center {{ $tradingSetting->buy_sell == true ? 'bg-primary' : 'bg-success' }}">
                                            {{ $tradingSetting->buy_sell == true ? 'Buy' : 'Sell' }}</div>
                                    </td>
                                    <td>{{ $tradingSetting->interval }}</td>
                                    <td>{{ $tradingSetting->style }}</td>
                                    <td>{{ $tradingSetting->theme }}</td>
                                    <td>{{ $tradingSetting->timezone }}</td>
                                    <td>{{ $tradingSetting->locale }}</td>
                                    <td>{{ $tradingSetting->range }}</td>
                                    <td>{{ $tradingSetting->width }}</td>
                                    <td>{{ $tradingSetting->height }}</td>
                                    <td>{{ $tradingSetting->hide_top_toolbar }}</td>
                                    <td>{{ $tradingSetting->withdateranges }}</td>
                                    <td>{{ $tradingSetting->hide_side_toolbar }}</td>
                                    <td>{{ $tradingSetting->details }}</td>
                                    <td>{{ $tradingSetting->calendar }}</td>
                                    <td>{{ $tradingSetting->hotlist }}</td>
                                    <td>{{ $tradingSetting->enable_publishing }}</td>
                                    <td>{{ $tradingSetting->user->name }}</td>
                                    <td>
                                        <div class="">
                                            <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                                    class="bi bi-three-dots"></i></a>
                                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                                <li><a class="dropdown-item text-center btn"
                                                        href="{{ route('trading-settings.show', $tradingSetting) }}">Show</a>
                                                </li>
                                                <li><a class="dropdown-item text-center btn"
                                                        href="{{ route('trading-settings.edit', $tradingSetting) }}">Edit</a>
                                                </li>
                                                <li>
                                                    <form action="{{ route('trading-settings.destroy', $tradingSetting) }}"
                                                        method="post">
                                                        @method('delete')
                                                        @csrf
                                                        <button class="dropdown-item text-center btn form-control"
                                                            type="submit"
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
                </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
        </section>
        <!-- /.Left col -->
    </div>
@endsection
