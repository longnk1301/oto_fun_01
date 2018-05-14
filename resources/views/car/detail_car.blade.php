@extends('layouts.index')

@section('content')

<div class="container post clearfix">
    <div class="row cf">
        <div class="col-md-7 details_product">
            <p>{{ $detail_car->car_name }}</p>
            <img src="{{ asset('images/products/toyota.jpeg') }}" alt="...">
        </div>
        <div class="col-md-5 search">
            <div class="image-product">
                <aside>
                    <h1>{{ $detail_car->car_cost }}</h1>
                    <ul>
                        <li>
                            <h3>{!! trans('index.vo') !!}</h3>
                            <p>{{ $detail_car->summary }}</p>
                            <p>{{ $detail_car->car_color }}</p>
                            <p>{{ $detail_car->car_years }}</p>
                        </li>
                    </ul>
                    <div class="card">
                        <div class="card-content">
                            <h4>{!! trans('index.check') !!}</h4>
                            <div class="card-button">
                                {!! Form::open(['method' => 'post', 'url' => '#', 'class' => 'sidebar-form']) !!}
                                    <button type="button" class="btn btn-info btn-lg btn-block" data-toggle="modal" data-target="#myModal">{!! trans('index.order') !!}</button>
                                        <div class="modal fade" id="myModal" role="dialog">
                                            <div class="modal-dialog modal-sm">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        <h4>{!! trans('index.info') !!}</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        {!! Form::hidden('car_id') !!}
                                                        <div class="text-left">
                                                            {!! Form::label('', trans('auth.fullname')) !!}
                                                            {!! Form::text('fullname', '' , ['class' => 'form-control']) !!}
                                                        </div>

                                                        <div class="text-left">
                                                            {!! Form::label('', trans('auth.identification')) !!}
                                                            {!! Form::text('identification', '' , ['class' => 'form-control']) !!}
                                                        </div>

                                                        <div class="text-left">
                                                            {!! Form::label('', trans('auth.zipcode')) !!}
                                                            {!! Form::text('zipcode', '' , ['class' => 'form-control']) !!}
                                                        </div>

                                                        <div class="text-left">
                                                            {!! Form::label('', trans('auth.phone')) !!}
                                                            {!! Form::text('phone', '' , ['class' => 'form-control']) !!}
                                                        </div>

                                                        <div class="text-left">
                                                            {!! Form::label('', trans('auth.address')) !!}
                                                            {!! Form::text('address', '' , ['class' => 'form-control']) !!}
                                                        </div>

                                                        <div class="text-left">
                                                            {!! Form::label('', trans('auth.email')) !!}
                                                            {!! Form::text('email', '' , ['class' => 'form-control']) !!}
                                                        </div>

                                                        <div class="text-left">
                                                            {!! Form::label('', trans('auth.note')) !!}
                                                            {{ Form::textarea('notes', null, ['size' => '30x5']) }}
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        {!! Form::submit( trans('auth.ok'), ['class' => 'btn btn-primary']) !!}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                  {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </div>
</div>
@endsection
