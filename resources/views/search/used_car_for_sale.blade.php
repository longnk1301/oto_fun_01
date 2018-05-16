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
    <div class="row promo">
        <div class="inner">
            <div class=" col-md-4 col-xs-12">
                <p>
                    <i class="fa fa-truck fa-2x" aria-hidden="true"></i>
                    Extensive Used Car Inventory
                </p>
                <span>Over 850,000 Pre-Owned vehicles for sale at nationwide</span>
            </div>
            <div class=" col-md-4 col-xs-12">
                <p>
                    <i class="fa fa-check-square-o fa-2x" aria-hidden="true"></i>
                    Buy With Confidence
                    <span>Get the best used car buying experience when you purchase from a TrueCar Certified Dealer who is dedicated to great service, and saving you time and money.</span>
                </p>
            </div>
            <div class=" col-md-4 col-xs-12">
                <p>
                    <i class="fa fa-road fa-2x" aria-hidden="true"></i>
                    Get Price Confidence
                    <span>TrueCar analyzes millions of local and national used car listings to determine whether listing prices are <b>great and good</b>.</span>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
