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
                                <br>
                                <button type="button" class="btn btn-success">{{ trans('auth.add_product') }}</button>
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
                            <th scope="row" class="height-th-left">{{ trans('auth.car_number') }}</th>
                        </tr>
                        <tr>
                            <th scope="row" class="height-th-left">{{ trans('index.year') }}</th>
                        </tr>
                        <tr>
                            <th scope="row" class="height-th-left">{{ trans('index.in_color') }}</th>
                        </tr>
                        <tr>
                            <th scope="row" class="height-th-left">{{ trans('index.ex_color') }}</th>
                        </tr>
                        <tr>
                            <th scope="row" class="height-th-left">{{ trans('index.trans') }}</th>
                        </tr>
                        <tr>
                            <th scope="row" class="height-th-left">{{ trans('index.engine') }}</th>
                        </tr>
                        <tr>
                            <th scope="row" class="height-th-left">{{ trans('index.mileage') }}</th>
                        </tr>
                        <tr>
                            <th scope="row" class="height-th-left">{{ trans('index.fuel') }}</th>
                        </tr>
                        <tr>
                            <th scope="row" class="height-th-left">{{ trans('index.drive') }}</th>
                        </tr>
                        <tr>
                            <th scope="row" class="height-th-left">{{ trans('index.mpg') }}</th>
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
                                    <tr>
                                        <th scope="row" class="height-img">
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
                                            {{ $car->qty }}
                                        </th>
                                    </tr>
                                    <tr>
                                        <th scope="row" class="height-th">
                                            {{ $car->options->year }}
                                        </th>
                                    </tr>
                                    <tr>
                                        <th scope="row" class="height-th">
                                            {{ $car->options->inColor }}
                                        </th>
                                    </tr>
                                    <tr>
                                        <th scope="row" class="height-th">
                                            {{ $car->options->exColor }}
                                        </th>
                                    </tr>
                                    <tr>
                                        <th scope="row" class="height-th">
                                            {{ $car->options->trans }}
                                        </th>
                                    </tr>
                                    <tr>
                                        <th scope="row" class="height-th">
                                            {{ $car->options->engine }}
                                        </th>
                                    </tr>
                                    <tr>
                                        <th scope="row" class="height-th">
                                            {{ $car->options->mileage }}
                                        </th>
                                    </tr>
                                    <tr>
                                        <th scope="row" class="height-th">
                                            {{ $car->options->fuel }}
                                        </th>
                                    </tr>
                                    <tr>
                                        <th scope="row" class="height-th">
                                            {{ $car->options->drive }}
                                        </th>
                                    </tr>
                                    <tr>
                                        <th scope="row" class="height-th">
                                            {{ $car->options->mpg }}
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
