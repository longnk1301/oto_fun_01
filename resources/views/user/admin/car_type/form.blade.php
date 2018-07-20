@extends('layouts.app')

@section('content')

<div class="bg-color">
    <!-- Content Header (Page header) -->
    <section class="content-header bg-white">
        <h1 class="color-text">
            {{ trans('auth.add_car_type') }}
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i>{{ trans('auth.dashboard') }}</a></li>
            <li><a href="{{ route('car_type.index') }}">{{ trans('auth.car_type') }}</a></li>
            <li class="active">{{ trans('auth.add') }}</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content bg-white">
        <div class="row">
            {!! Form::open(['method' => 'POST', 'route' => 'car_type.save', 'class' => 'form-horizontal', 'id' => 'car-type-form']) !!}
                {!! Form::hidden('id', $model->id) !!}
                    <div class="col-md-8 col-md-offset-1">
                        <div class="form-group row">
                            {!! Html::decode(Form::label('type', trans('index.car_type') . '<span class="text-danger"> *</span>', ['class' => 'col-md-4 control-label'])) !!}
                            <div class="col-md-8">
                                {!! Form::text('type', $model->type , ['class' => 'form-control']) !!}
                            </div>
                        </div>

                        <div class="text-center">
                            <a href="{{ route('car_type.index') }}" class="btn btn-danger">{{ trans('auth.cancel') }}</a>
                            {!! Form::submit(trans('auth.save'), ['class' => 'btn btn-success']) !!}
                        </div>
                    </div>
                <!-- /.col -->
                {!! Form::hidden('', csrf_token(), ['id' => 'ajaxToken']) !!}
            {!! Form::close() !!}
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
@endsection

@section('js')

@include('user.admin.car_type.js')

@endsection
