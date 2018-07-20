@extends('layouts.app')

@section('content')

<div class="bg-color">
    <!-- Content Header (Page header) -->
    <section class="content-header bg-white">
        <h1 class="color-text">
            {{ trans('auth.add_color') }}
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i>{{ trans('auth.dashboard') }}</a></li>
            <li><a href="{{ route('color.index') }}">{{ trans('auth.color') }}</a></li>
            <li class="active">{{ trans('auth.add') }}</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content bg-white">
        <div class="row">
            {!! Form::open(['method' => 'POST', 'route' => 'color.save', 'class' => 'form-horizontal', 'id' => 'color-form']) !!}
                {!! Form::hidden('id', $model->id) !!}
                    <div class="col-md-8 col-md-offset-1">
                        <div class="form-group row">
                            {!! Html::decode(Form::label('color', trans('auth.add_color') . '<span class="text-danger"> *</span>', ['class' => 'col-md-4 control-label'])) !!}
                            <div class="col-md-8">
                                {!! Form::text('color', $model->color , ['class' => 'form-control']) !!}
                            </div>
                        </div>

                        <div class="text-center">
                            <a href="{{ route('color.index') }}" class="btn btn-danger">{{ trans('auth.cancel') }}</a>
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

@include('user.admin.color.js')

@endsection
