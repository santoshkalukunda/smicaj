@extends('backend.app')7
@section('content')
    @push('styles')
        <style>
            .box:hover {
                box-shadow: 6px 6px 13px -4px rgba(0, 0, 0, 0.71);
                -webkit-box-shadow: 6px 6px 13px -4px rgba(0, 0, 0, 0.71);
                -moz-box-shadow: 6px 6px 13px -4px rgba(0, 0, 0, 0.71);
            }
        </style>
    @endpush
    <!-- Content Header (Page header) -->
    <div class="row py-2">
        <div class="col-sm-6">
            <h4 class="my-2"> {{ $title = 'Layout Setting Create' }} </h3>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('layout-settings.index') }}"> <i
                            class="bi bi-arrow-clockwise"></i> Go Back</a></li>
            </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
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
                                        <td colspan="2" class="text-center py-3">View 1</td>
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
                                        <td colspan="3" class="text-center py-3">View 1</td>
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
@endsection
