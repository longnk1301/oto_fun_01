@extends('layouts.index')

@section('content')
    <div class="container post">
        <div class="prop-left">
            <div class="property-fly">
                <table class="table table-bordered table-striped table-hover">
                      <tbody>
                        <tr>
                            <th scope="row" class="height-img">
                                <a href=" {{ route('compare') }}" class="btn btn-primary">
                                    <i class="fa fa-reply-all" aria-hidden="true"></i>
                                </a>
                            </th>
                        </tr>
                        <tr>
                            <th scope="row" class="height-th-left">{{ trans('index.car_name') }}</th>
                        </tr>
                        <tr>
                            <th scope="row" class="height-th-left">{{ trans('index.car_type') }}</th>
                        </tr>
                        <tr>
                            <th scope="row" class="height-th-left">{{ trans('auth.cost') }}</th>
                        </tr>
                        <tr>
                            <th scope="row" class="height-th-left">{{ trans('auth.company') }}</th>
                        </tr>
                        <tr>
                            <th scope="row" class="height-th-left">{{ trans('index.year') }}</th>
                        </tr>
                        <tr>
                            <th scope="row" class="height-th-left">{{ trans('index.car_color') }}</th>
                        </tr>
                        <tr>
                            <th scope="row" class="height-th-left">{{ trans('auth.car_number') }}</th>
                        </tr>
                        <tr>
                            <th scope="row" class="height-optional">{{ trans('auth.tissue_men') }}</th>
                        </tr>
                        <tr>
                            <th scope="row" class="height-th-left">{{ trans('auth.gear') }}</th>
                        </tr>
                        <tr>
                            <th scope="row" class="height-th-left">{{ trans('auth.engine_type') }}</th>
                        </tr>
                        <tr>
                            <th scope="row" class="height-th-left">{{ trans('auth.cylinder_capacity') }}</th>
                        </tr>
                        <tr>
                            <th scope="row" class="height-th-left">{{ trans('auth.max_capacity') }}</th>
                        </tr>
                        <tr>
                            <th scope="row" class="height-optional">{{ trans('auth.drive_type') }}</th>
                        </tr>
                        <tr>
                            <th scope="row" class="height-optional">{{ trans('auth.drive_style') }}</th>
                        </tr>
                        <tr>
                            <th scope="row" class="height-th-left">{{ trans('auth.locksner') }}</th>
                        </tr>
                        <tr>
                            <th scope="row" class="height-th-left">{{ trans('auth.locksremote') }}</th>
                        </tr>
                        <tr>
                            <th scope="row" class="height-th-left">{{ trans('auth.turn_signal_light') }}</th>
                        </tr>
                        <tr>
                            <th scope="row" class="height-th-left">{{ trans('auth.height') }}</th>
                        </tr>
                        <tr>
                            <th scope="row" class="height-th-left">{{ trans('auth.weight') }}</th>
                        </tr>
                        <tr>
                            <th scope="row" class="height-th-left">{{ trans('auth.width') }}</th>
                        </tr>
                        <tr>
                            <th scope="row" class="height-th-left">{{ trans('auth.colc') }}</th>
                        </tr>
                        <tr>
                            <th scope="row" class="height-th-left">{{ trans('auth.volume_fuel') }}</th>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="contentscroll">
            @foreach($content as $car)
                <div class="content-item">
                    <div class="autocompare-item">
                        <div>
                            <table class="table table-bordered table-striped table-hover">
                                <tbody>
                                    <tr class="height-img">
                                        <th scope="row" >
                                            <img src="{{ asset($car->options->img) }}" alt="">
                                        </th>
                                    </tr>
                                    <tr>
                                        <th scope="row" class="height-th">
                                            {{ $car->name }}
                                        </th>
                                    </tr>
                                    <tr>
                                        <th scope="row" class="height-th">
                                            {{ $car->options->type }}
                                        </th>
                                    </tr>
                                    <tr>
                                        <th scope="row" class="height-th">
                                            ${{ number_format($car->price, 0, ", ", ".") }}
                                        </th>
                                    </tr>
                                    <tr>
                                        <th scope="row" class="height-th">
                                            {{ $car->options->company}}
                                        </th>
                                    </tr>
                                    <tr>
                                        <th scope="row" class="height-th">
                                            {{ $car->options->year }}
                                        </th>
                                    </tr>
                                    <tr>
                                        <th scope="row" class="height-th">
                                            {{ $car->options->color }}
                                        </th>
                                    </tr>
                                    <tr>
                                        <th scope="row" class="height-th">
                                            {{ $car->qty }}
                                        </th>
                                    </tr>
                                    <tr>
                                        <th scope="row" class="height-optional">
                                            {{ $car->options->tissue_men }}
                                        </th>
                                    </tr>
                                    <tr>
                                        <th scope="row" class="height-th">
                                            {{ $car->options->gear }}
                                        </th>
                                    </tr>
                                    <tr>
                                        <th scope="row" class="height-th">
                                            {{ $car->options->engine_type }}
                                        </th>
                                    </tr>
                                    <tr>
                                        <th scope="row" class="height-th">
                                            {{ $car->options->cylinder_capacity }}
                                        </th>
                                    </tr>
                                    <tr>
                                        <th scope="row" class="height-th">
                                            {{ $car->options->max_capacity }}
                                        </th>
                                    </tr>
                                    <tr>
                                        <th scope="row" class="height-optional">
                                            {{ $car->options->drive_type }}
                                        </th>
                                    </tr>
                                    <tr>
                                        <th scope="row" class=height-optional">
                                            {{ $car->options->drive_style }}
                                        </th>
                                    </tr>
                                    <tr>
                                        <th scope="row" class="height-th">
                                            {{ $car->options->locks_nearby }}
                                        </th>
                                    </tr>
                                    <tr>
                                        <th scope="row" class="height-th">
                                            {{ $car->options->locks_remote }}
                                        </th>
                                    </tr>
                                    <tr>
                                        <th scope="row" class="height-th">
                                            {{ $car->options->turn_signal_light }}
                                        </th>
                                    </tr>
                                    <tr>
                                        <th scope="row" class="height-th">
                                            {{ $car->options->height }}
                                        </th>
                                    </tr>
                                    <tr>
                                        <th scope="row" class="height-th">
                                            {{ $car->options->weight }}
                                        </th>
                                    </tr>
                                    <tr>
                                        <th scope="row" class="height-th">
                                            {{ $car->options->width }}
                                        </th>
                                    </tr>
                                    <tr>
                                        <th scope="row" class="height-th">
                                            {{ $car->options->colc }}
                                        </th>
                                    </tr>
                                    <tr>
                                        <th scope="row" class="height-th">
                                            {{ $car->options->volume_fuel }}
                                        </th>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
