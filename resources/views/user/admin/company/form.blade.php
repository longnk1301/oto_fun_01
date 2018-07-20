@extends('layouts.app')

@section('content')

<div class="bg-color">
    <!-- Content Header (Page header) -->
    <section class="content-header bg-white">
        <h1 class="color-text">
            {{ trans('auth.add_company') }}
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i>{{ trans('auth.dashboard') }}</a></li>
            <li><a href="{{ route('company.index') }}">{{ trans('auth.company') }}</a></li>
            <li class="active">{{ trans('auth.add') }}</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content bg-white">
        <div class="row">
            {!! Form::open(['method' => 'POST', 'route' => 'company.save', 'class' => 'form-horizontal', 'id' => 'company-form', 'enctype' => 'multipart/form-data']) !!}
                {!! Form::hidden('id', $model->id) !!}
                    <div class="col-md-9 col-md-offset-1">
                        <div class="form-group row">
                            {!! Html::decode(Form::label('com_name', trans('auth.company') . '<span class="text-danger"> *</span>', ['class' => 'col-md-4 control-label'])) !!}
                            <div class="col-md-8">
                                {!! Form::text('com_name', $model->com_name , ['class' => 'form-control']) !!}
                            </div>
                        </div>

                        <div class="form-group row">
                            {!! Html::decode(Form::label('com_add', trans('auth.address') . '<span class="text-danger"> *</span>', ['class' => 'col-md-4 control-label'])) !!}
                            <div class="col-md-8 div-cate-relative">
                                {!! Form::text('com_add', $model->com_add, ['class' => 'form-control']) !!}
                            </div>
                        </div>

                        <div class="form-group row">
                            {!! Html::decode(Form::label('com_phone', trans('auth.phone') . '<span class="text-danger"> *</span>', ['class' => 'col-md-4 control-label'])) !!}
                            <div class="col-md-8 div-cate-relative">
                                {!! Form::text('com_phone', $model->com_phone, ['class' => 'form-control']) !!}
                            </div>
                        </div>

                        <div class="text-center">
                            <a href="{{ route('company.index') }}" class="btn btn-danger">{{ trans('auth.cancel') }}</a>
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

@include('user.admin.company.js')

@endsection
