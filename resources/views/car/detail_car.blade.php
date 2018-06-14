@extends('layouts.index')

@section('content')

<div class="container post clearfix">
    <div class="row clearfix">
        <div class="row">
            @if (session('msg'))
                <div class="alert alert-success">
                    <span>{{ session('msg') }}</span>
                </div>
            @endif
        </div>
        <div class="col-md-7 details_product clearfix">
            <p><b>{{ trans('index.car_name') }}: {{ $detail_car->car_name }}</b></p>
            <p><b>{{ trans('index.car_color') }}: </b>{{ $colors->color }}</p>
            @if (!isset($images))
                {{ null }}
            @else
                @foreach ($images as $image)
                    <img src="{{ asset($image->image) }}" alt="...">
                @endforeach
            @endif
        </div>
        <div class="col-md-5 search clearfix">
            <div class="image-product">
                <aside>
                    <h1 class="text-orange"><i class="fa fa-usd" aria-hidden="true"></i>{{ number_format($detail_car->car_cost, 0, ", ", ".") }}</h1>
                    <ul>
                        <li>
                            <p>{{ trans('auth.gear') }}: {{ $operates->gear }}</p>
                            <p>{!! $detail_car->summary !!}</p>
                            <p class="text-blue">{{ trans('index.year') }}: {{ $detail_car->car_year }}</p>
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
                                {!! Form::open(['method' => 'post', 'route' => 'order', 'class' => 'sidebar-form']) !!}
                                    <button type="button" class="btn btn-info btn-lg btn-block" data-toggle="modal" data-target="#myModal">{!! trans('index.order') !!}</button>
                                        <div class="modal fade" id="myModal" role="dialog">
                                            <div class="modal-dialog ">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        <h4>{!! trans('index.info') !!}</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        {!! Form::hidden('car_id', $detail_car->id) !!}
                                                        <div class="text-left">
                                                            {!! Form::label('fullname', trans('auth.fullname')) !!}
                                                            @if (!isset(Auth::user()->name))
                                                                {!! Form::text('cus_name', '' , ['class' => 'form-control']) !!}
                                                            @else
                                                                {!! Form::text('cus_name', Auth::user()->name , ['class' => 'form-control']) !!}
                                                            @endif
                                                        </div>

                                                        <div class="text-left">
                                                            {!! Form::label('identification', trans('auth.identification')) !!}
                                                            {!! Form::text('identification', '' , ['class' => 'form-control']) !!}
                                                        </div>

                                                        <div class="text-left">
                                                            {!! Form::label('phone', trans('auth.phone')) !!}
                                                            @if (!isset(Auth::user()->phone))
                                                                {!! Form::text('cus_phone', '' , ['class' => 'form-control']) !!}
                                                            @else
                                                                {!! Form::text('cus_phone', Auth::user()->phone , ['class' => 'form-control']) !!}
                                                            @endif
                                                        </div>

                                                        <div class="text-left">
                                                            {!! Form::label('address', trans('auth.address')) !!}
                                                            @if (!isset(Auth::user()->add))
                                                                {!! Form::text('cus_add', '' , ['class' => 'form-control']) !!}
                                                            @else
                                                                {!! Form::text('cus_add', Auth::user()->add , ['class' => 'form-control']) !!}
                                                            @endif
                                                        </div>

                                                        <div class="text-left">
                                                            {!! Form::label('email', trans('auth.email')) !!}
                                                            @if (!isset(Auth::user()->email))
                                                                {!! Form::text('cus_email', '' , ['class' => 'form-control']) !!}
                                                            @else
                                                                {!! Form::text('cus_email', Auth::user()->email , ['class' => 'form-control']) !!}
                                                            @endif
                                                        </div>

                                                        <div class="text-left">
                                                            {!! Form::label('notes', trans('auth.note')) !!}
                                                            {{ Form::textarea('content', null, ['size' => '80x10', 'class' => 'form-control']) }}
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
     <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning">10</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 10 notifications</li>
              <li class="footer"><a href="#">View all</a></li>
            </ul>
          </li>
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
                        <i class="fa fa-certificate fa-3x" aria-hidden="true"></i>
                        {{ trans('index.in_color') }}
                        <h5>{{ $colors->color }}</h5>
                    </p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="vehicle-item">
                    <p>
                        <i class="fa fa-money fa-3x" aria-hidden="true"></i>
                        {{ trans('index.price') }}
                        <h5>{{ $detail_car->car_cost }}</h5>
                    </p>
                </div>
            </div>

        {{-- engines --}}
        <h3>{!! trans('auth.engines') !!}</h3>
            <div class="col-md-4">
                <div class="vehicle-item">
                    <p>
                        <i class="fa fa-wrench fa-3x" aria-hidden="true"></i>
                        {{ trans('auth.engine_type') }}
                        <h5>{{ $engines->engine_type }}</h5>
                    </p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="vehicle-item">
                    <p>
                        <i class="fa fa-plus-square fa-3x" aria-hidden="true"></i>
                        {{ trans('auth.cylinder_capacity') }}
                        <h5>{{ $engines->cylinder_capacity }}</h5>
                    </p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="vehicle-item">
                    <p>
                        <i class="fa fa-maxcdn fa-3x" aria-hidden="true"></i>
                        {{ trans('auth.max_capacity') }}
                        <h5>{{ $engines->max_capacity }}</h5>
                    </p>
                </div>
            </div>

        {{-- exteriors --}}
        <h3>{!! trans('auth.exteriors') !!}</h3>
            <div class="col-md-4">
                <div class="vehicle-item">
                    <p>
                        <i class="fa fa-wrench fa-3x" aria-hidden="true"></i>
                        {{ trans('auth.locksner') }}
                        <h5>{{ $exteriors->locks_nearby }}</h5>
                    </p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="vehicle-item">
                    <p>
                        <i class="fa fa-plus-square fa-3x" aria-hidden="true"></i>
                        {{ trans('auth.locksremote') }}
                        <h5>{{ $exteriors->locks_remote }}</h5>
                    </p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="vehicle-item">
                    <p>
                        <i class="fa fa-maxcdn fa-3x" aria-hidden="true"></i>
                        {{ trans('auth.turn_light') }}
                        <h5>{{ $exteriors->turn_signal_light }}</h5>
                    </p>
                </div>
            </div>

        {{-- sizes --}}
        <h3>{!! trans('auth.sizes') !!}</h3>
        <div class="col-md-3">
            <div class="vehicle-item">
                <p>
                    <i class="fa fa-wrench fa-3x" aria-hidden="true"></i>
                    {{ trans('auth.height') }}
                    <h5>{{ $sizes->height }}</h5>
                </p>
            </div>
        </div>
        <div class="col-md-2">
            <div class="vehicle-item">
                <p>
                    <i class="fa fa-plus-square fa-3x" aria-hidden="true"></i>
                    {{ trans('auth.weight') }}
                    <h5>{{ $sizes->weight }}</h5>
                </p>
            </div>
        </div>
        <div class="col-md-2">
            <div class="vehicle-item">
                <p>
                    <i class="fa fa-plus-square fa-3x" aria-hidden="true"></i>
                    {{ trans('auth.width') }}
                    <h5>{{ $sizes->width }}</h5>
                </p>
            </div>
        </div>
        <div class="col-md-2">
            <div class="vehicle-item">
                <p>
                    <i class="fa fa-plus-square fa-3x" aria-hidden="true"></i>
                    {{ trans('auth.colc') }}
                    <h5>{{ $sizes->colc }}</h5>
                </p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="vehicle-item">
                <p>
                    <i class="fa fa-plus-square fa-3x" aria-hidden="true"></i>
                    {{ trans('auth.volume_fuel') }}
                    <h5>{{ $sizes->volume_fuel }}</h5>
                </p>
            </div>
        </div>

        {{-- operates --}}
        <div class="row">
            <h3>{!! trans('auth.operates') !!}</h3>
            <div class="col-md-4">
                <div class="vehicle-item">
                    <p>
                        <i class="fa fa-wrench fa-3x" aria-hidden="true"></i>
                        {{ trans('auth.tissue_men') }}
                        <h5>{{ $operates->tissue_man }}</h5>
                    </p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="vehicle-item">
                    <p>
                        <i class="fa fa-plus-square fa-3x" aria-hidden="true"></i>
                        {{ trans('auth.gear') }}
                        <h5>{{ $operates->gear }}</h5>
                    </p>
                </div>
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
