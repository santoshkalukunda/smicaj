@extends('layouts.app')

@section('content')
    <div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="fs-1 py-4 text-center">{{$page->title}}</div>
                   <p>{!! $page->content !!}</p>
                </div>
            </div>
        </div>
    </div>
 
@endsection
