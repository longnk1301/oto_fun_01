@extends('layouts.index')

@section('content')

<div class="container post clearfix">
    <div class="row clearfix">
        <div class="col-md-7 details_product clearfix">
            <p><b>{{ $detail_car->car_name }}</b></p>
            <p><b>{{ trans('index.engine') }}: </b>{{ $vehicle[0]->engine }} | <b>{{ trans('index.mileage') }}: </b>{{ $vehicle[0]->mileage }}</p>
            <img src="{{ asset($detail_car->car_image) }}" alt="...">
        </div>
        <div class="col-md-5 search clearfix">
            <div class="image-product">
                <aside>
                    <h1><i class="fa fa-usd" aria-hidden="true"></i>{{ number_format($detail_car->car_cost, 0, ", ", ".") }}</h1>
                    <ul>
                        <li>
                            <p>{{ $detail_car->summary }}</p>
                            <p>{{ trans('index.year') }}: {{ $detail_car->car_years }}</p>
                        </li>
                    </ul>
                    <div class="card clearfix">
                        <div class="card-content">
                            <h4>{!! trans('index.check') !!}</h4>
                            <ul>
                                <li><i class="fa fa-check" aria-hidden="true"></i>{{ trans('index.check1') }}</li>
                                <li><i class="fa fa-check" aria-hidden="true"></i>{{ trans('index.check1') }}</li>
                                <li><i class="fa fa-check" aria-hidden="true"></i>{{ trans('index.check1') }}</li>
                            </ul>
                            <div class="card-button">
                                {!! Form::open(['method' => 'post', 'url' => '#', 'class' => 'sidebar-form']) !!}
                                    <button type="button" class="btn btn-info btn-lg btn-block" data-toggle="modal" data-target="#myModal">{!! trans('index.order') !!}</button>
                                        <div class="modal fade" id="myModal" role="dialog">
                                            <div class="modal-dialog ">
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
                                                            {{ Form::textarea('notes', null, ['size' => '68x5']) }}
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
     <div class="row vehicle clearfix">
        <h3>{!! trans('index.vo') !!}</h3>
            <div class="col-md-4">
                <div class="vehicle-item">
                    <p>
                        <i class="fa fa-car fa-3x" aria-hidden="true"></i>
                        {{ trans('index.trim') }}
                        <h5>{{ $detail_car->car_name }}</h5>
                    </p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="vehicle-item">
                    <p>
                        <i class="fa fa-stethoscope fa-3x" aria-hidden="true"></i>
                        {{ trans('index.trans') }}
                        <h5>{{ $vehicle[0]->transmission }}</h5>
                    </p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="vehicle-item">
                    <p>
                        <i class="fa fa-paint-brush fa-3x" aria-hidden="true"></i>
                        {{ trans('index.ex_color') }}
                        <h5>{{ $vehicle[0]->exterior_color }}</h5>
                    </p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="vehicle-item">
                    <p>
                        <i class="fa fa-wrench fa-3x" aria-hidden="true"></i>
                        {{ trans('index.engine') }}
                        <h5>{{ $vehicle[0]->engine }}</h5>
                    </p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="vehicle-item">
                    <p>
                        <i class="fa fa-certificate fa-3x" aria-hidden="true"></i>
                        {{ trans('index.in_color') }}
                        <h5>{{ $vehicle[0]->interior_color }}</h5>
                    </p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="vehicle-item">
                    <p>
                        <i class="fa fa-cogs fa-3x" aria-hidden="true"></i>
                        {{ trans('index.drive') }}
                        <h5>{{ $vehicle[0]->drive_type }}</h5>
                    </p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="vehicle-item">
                    <p>
                        <i class="fa fa-line-chart fa-3x" aria-hidden="true"></i>
                        {{ trans('index.mileage') }}
                        <h5>{{ $vehicle[0]->mileage }}</h5>
                    </p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="vehicle-item">
                    <p>
                        <i class="fa fa-free-code-camp fa-3x" aria-hidden="true"></i>
                        {{ trans('index.fuel') }}
                        <h5>{{ $vehicle[0]->fuel_type }}</h5>
                    </p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="vehicle-item">
                    <p>
                        <i class="fa fa-tint fa-3x" aria-hidden="true"></i>
                        {{ trans('index.mpg') }}
                        <h5>{{ $vehicle[0]->mpg }}</h5>
                </div>
            </div>
    </div>
    <div class="col-md-12 feature">
                <h3>{{ trans('index.feature') }}</h3>
                <p>Traction Control, Rear Wheel Drive, Locking/Limited Slip Differential, Tires - Front Performance, Tires - Rear Performance, Aluminum Wheels, 4-Wheel Disc Brakes, Power Steering, Convertible Soft Top, Heated Mirrors, Power Mirror(s), Privacy Glass, Intermittent Wipers, Variable Speed Intermittent Wipers, Leather Seats, Adjustable Steering Wheel, Leather Steering Wheel, Power Windows, Keyless Entry, Power Door Locks, Remote Trunk Release, Rear Defrost, AM/FM Stereo, CD Player, Passenger Vanity Mirror, Driver Air Bag, Passenger Air Bag</p>
            </div>
            <div class="col-md-12 seller_note">
                <h3>{{ trans('index.seller') }}</h3>
                <p>This Ferrari 360 has a strong Gas V8 3.6L/218 engine powering this Automatic transmission. Vehicle speed proportional pwr steering, Variable intermittent windshield wipers, Tinted glass on cabin, Remote pwr locks, Remote fuel filler door release. 9 Carfax Service Records.*This Ferrari 360 Features the Following Options *Rear window defogger, Rear wheel drive, Rear fog lights, Pwr retractable top, Pwr remote trunk/hatch release, Pwr front windows w/one-touch down feature, Projector beam lens halogen bulb headlights, Peripheral anti-theft protection, Passenger vanity mirror, P275/40/ZR18 rear tires, P215/45/ZR18 front tires, Limited slip rear differential, Lighting-inc: delayed fade courtesy lights, reading lights, Leather trim on doors & dashboard, Leather covered tilt/telescopic steering wheel.*Drive Your Ferrari 360 Spider With Confidence *Carfax reports: No Damage Reported, No Accidents Reported, 9 Service Records.*Visit Us Today *Test drive this must-see, must-drive, must-own beauty today at Rolls-Royce Motor Cars Raleigh, 5401 Capital Blvd, Raleigh, NC 27616.</p>
            </div>
</div>
@endsection
