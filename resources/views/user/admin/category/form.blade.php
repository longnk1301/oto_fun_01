@extends('layouts.app')

@section('content')

<div class="bg-color">
    <!-- Content Header (Page header) -->
    <section class="content-header bg-white">
        <h1 class="color-text">
            {{ trans('auth.add_category') }}
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i>{{ trans('auth.dashboard') }}</a></li>
            <li><a href="{{ route('cate.index') }}">{{ trans('auth.categories') }}</a></li>
            <li class="active">{{ trans('auth.add') }}</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content bg-white">
        <div class="row">
            {!! Form::open(['method' => 'POST', 'route' => 'cate.save', 'class' => 'form-horizontal', 'id' => 'cate-form', 'enctype' => 'multipart/form-data']) !!}
                {!! Form::hidden('id', $model->id) !!}
                <div class="col-md-6">
                    <div class="form-group row">
                        {!! Html::decode(Form::label('category_name', trans('auth.category_name') . '<span class="text-danger"> *</span>', ['class' => 'col-md-4 control-label'])) !!}
                        <div class="col-md-8">
                            {!! Form::text('category_name', $model->category_name , ['class' => 'form-control', 'id' => 'cateName', 'placeholder' => trans('auth.category_name')]) !!}
                        </div>
                    </div>

                    <div class="form-group row">
                        {!! Html::decode(Form::label('slug', trans('auth.slug') . '<span class="text-danger"> *</span>', ['class' => 'col-md-4 control-label'])) !!}
                        <div class="col-md-8 div-cate-relative">
                            {!! Form::text('slug', $model->slug, ['class' => 'form-control', 'id' => 'slug', 'placeholder' => trans('auth.ex_slug')]) !!}
                            {!! Html::decode(Form::button('<i class="fa fa-bolt"></i>', ['class' => 'btn btn-success btn-sm btn-asl-form'])) !!}
                        </div>
                    </div>

                    <div class="form-group row">
                        {!! Html::decode(Form::label('', trans('auth.parent_name') . '<span class="text-danger"> *</span>', ['class' => 'col-md-4 control-label'])) !!}
                       <div class="col-md-8">
                                {!! Form::select(
                                            'parent_id',
                                            $select,
                                            $selected,
                                            ['class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-2 col-md-offset-2">{{ trans('auth.status') }}</label>
                        <label class="radio-custom col-md-3 input-md">
                            {!! Form::radio('status', 'UnPublic', $status == 'UnPublic') !!}
                            {{ trans('auth.unpublic') }}
                        </label>
                        <label class="radio-custom col-md-3 input-md">
                            {!! Form::radio('status', 'Public', $status == 'Public') !!}
                            {{ trans('auth.public') }}
                        </label>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-offset-5">
                            <img src="
                                    @if($model->image == "")
                                        {{ asset('images/products/product-1.webp') }}
                                    @else
                                        {{ asset('/storage/' . $model->image) }}
                                    @endif" id="Image" class="images-show-admin">
                        </div>
                    </div>
                    <div class="form-group row">
                        {!! Html::decode(Form::label('image', trans('auth.image'), ['class' => 'col-md-4 control-label'])) !!}
                        <div class="col-md-8">
                            {!! Form::file('image', ['id' => 'image', 'accept' => 'image/*']) !!}
                            @if(count($errors) > 0)
                                <span class="text-danger">{{$errors->first('image')}}</span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group row">
                        <div class="col-md-11 col-md-offset-1">
                            <div class="box box-info">
                                <div class="box-header">
                                    <h3 class="box-title">{{ trans('auth.summary') }}
                                    </h3>
                                    <!-- tools box -->
                                    <div class="pull-right box-tools">
                                        {!! Html::decode(Form::button('<i class="fa fa-minus"></i>', ['class' => 'btn btn-info btn-sm', 'data-toggle' => 'tooltip', 'data-wiget' => 'collapse', 'title' => 'Collapse'])) !!}
                                        {!! Html::decode(Form::button('<i class="fa fa-times"></i>', ['class' => 'btn btn-info btn-sm', 'data-toggle' => 'tooltip', 'data-wiget' => 'collapse', 'title' => 'Remove'])) !!}
                                    </div>
                                <!-- /. tools -->
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body pad">
                                    {{ Form::textarea('summary', $model->summary, ['size' => '80x10', 'id' => 'editor1']) }}
                                </div>
                            </div>
                            <!-- /.box -->
                        </div>
                    </div>

                    <div class="text-center">
                        <a href="{{ route('cate.index') }}" class="btn btn-danger">{{ trans('auth.cancel') }}</a>
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

@include('user.admin.category.js')

@endsection
