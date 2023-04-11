@extends('layouts.app')

@section('content')
    <div>
        <div class="container">
            <div class="row">

                <div class="col-md-12">
                    <div id="tvchart"></div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')

   <script src="{{asset('js/tv.js')}}"></script>
   <script src="{{asset('js/stock.js')}}"></script>
@endpush
