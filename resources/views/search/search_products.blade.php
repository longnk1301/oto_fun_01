@extends('layouts.index')

@section('content')
<div class="container post clearfix">
    <div class="row clearfix search-box">
        <div class="search-box-wrapper">
            {!! Form::open(['method' => 'get', 'url' => route('client.search.product')]) !!}
                <div class="row">
                    <div class="col-md-12">
                        <h1>{!! trans('index.used_car_for_sale') !!}</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8">
                        <div class="suggest">
                            {!! Form::text('keyword', '', ['class' => 'form-control', 'placeholder' => trans('index.search_by')]) !!}
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div>
                            {!! Form::submit( trans('index.go'), ['class'=> 'btn btn-info']) !!}
                        </div>
                    </div>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
    <div class="row">
    	@foreach ($cars as $car)
    	<div class="row">
            <div class="col-md-8 products">
                <div class="col-xs-4">
                    <img src="{{ asset('images/products/index.jpeg') }}" alt="">
                </div>
                <div class="col-xs-5">
                    <p><b>{{ trans('index.car_name') }}</b>{{ $car->car_name }}</p>
                    <p><b>{{ trans('index.car_type') }}</b>{{ $car->car_type }}</p>
                    <p><b>{{ trans('index.car_year') }}</b>{{ $car->car_years }}</p>
                    <p><b>{{ trans('index.car_summary') }}</b>{{ $car->summary }}</p>
                </div>
                <div class="col-xs-3">
                    <p><b>${{ $car->car_cost }}</b></p>
                    <b><a href="/details-car/{{ $car->id }}">{{ trans('index.views_details') }}</a></b>
                </div>
            </div>
    	</div>
    	@endforeach
    </div>
    <div class="advertisement">
        <img src="{{ asset('images/products/quangcao.jpg') }}" alt="">
    </div>
</div>
@endsection
