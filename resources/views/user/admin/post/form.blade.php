@extends('layouts.app')

@section('content')

<div class="bg-color">
    <!-- Content Header (Page header) -->
    <section class="content-header bg-white">
        <h1 class="color-text">
            {{ trans('auth.add_post') }}
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i>{{ trans('auth.dashboard') }}</a></li>
            <li><a href="{{ route('post.index') }}">{{ trans('auth.posts') }}</a></li>
            <li class="active">{{ trans('auth.add') }}</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content bg-white">
        <div class="row">
            {!! Form::open(['method' => 'POST', 'route' => 'post.save', 'class' => 'form-horizontal', 'id' => 'post-form', 'enctype' => 'multipart/form-data']) !!}
                {!! Form::hidden('id', $model->id) !!}
                <div>
                    <div class="col-md-12 mg-top">
                        <div class="form-group row">
                            {!! Html::decode(Form::label('title', trans('auth.title') . '<span class="text-danger"> *</span>', ['class' => 'col-md-2 control-label'])) !!}
                            <div class="col-md-8">
                                {!! Form::text('title', $model->title , ['class' => 'form-control', 'id' => 'title', 'placeholder' => trans('auth.title')]) !!}
                            </div>
                        </div>

                        <div class="form-group row">
                            {!! Html::decode(Form::label('slug', trans('auth.slug') . '<span class="text-danger"> *</span>', ['class' => 'col-md-2 control-label'])) !!}
                            <div class="col-md-8 div-cate-relative">
                                {!! Form::text('slug', $model->slug, ['class' => 'form-control', 'id' => 'slug', 'placeholder' => trans('auth.ex_slug')]) !!}
                                {!! Html::decode(Form::button('<i class="fa fa-bolt"></i>', ['class' => 'btn btn-success btn-sm btn-asl-form'])) !!}
                            </div>
                        </div>

                        <div class="form-group row">
                            {!! Html::decode(Form::label('tags', trans('auth.tags'), ['class' => 'col-md-2 control-label'])) !!}
                            <div class="col-md-8">
                                {!! Form::text('tags', isset($tags) ? $tags : null, ['class' => 'form-control', 'data-role' => 'tagsinput']) !!}
                            </div>
                        </div>

                        <div class="form-group row">
                            {!! Html::decode(Form::label('', trans('auth.category_name'), ['class' => 'col-md-2 control-label'])) !!}
                            <div class="col-md-8">
                                {!! Form::select(
                                    'category_id',
                                    $select,
                                    $selected,
                                    ['class' => 'form-control']) !!}
                            </div>
                        </div>

                        <div class="form-group row">
                            {!! Html::decode(Form::label('title', trans('auth.summary'), ['class' => 'col-md-2 control-label'])) !!}
                            <div class="col-md-8">
                                {!! Form::text('summary', $model->summary , ['class' => 'form-control', 'id' => 'summary', 'placeholder' => trans('auth.summary')]) !!}
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group row">
                            <div class="col-md-offset-2">
                                @if(!isset($images))
                                    <img src="{{ asset('images/products/product-1.webp') }}" id="Image" class="images-show-admin">
                                @else
                                    @foreach ($images as $allImages)
                                        <img src="{{ asset($allImages->image) }}" id="Image" class="images-show-admin">
                                    @endforeach
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            {!! Html::decode(Form::label('image', trans('auth.image'), ['class' => 'col-md-2 control-label'])) !!}
                            <div class="col-md-3">
                                {!! Form::file('image[]', ['id' => 'image', 'accept' => 'image/*', 'multiple']) !!}
                                @if(count($errors) > 0)
                                    <span class="text-danger">{{$errors->first('image')}}</span>
                                @endif
                            </div>

                            <label class="radio-custom col-md-2 input-md ">
                                {!! Form::radio('status', 'UnPublic', $status == 'UnPublic') !!}
                                {{ trans('auth.unpublic') }}
                            </label>
                            <label class="radio-custom col-md-2 input-md">
                                {!! Form::radio('status', 'Public', $status == 'Public') !!}
                                {{ trans('auth.public') }}
                            </label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group row">
                            <div class="col-md-10 col-md-offset-1">
                                <div class="box box-info">
                                    <div class="box-header">
                                        <h3 class="box-title">{{ trans('auth.content') }}
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
                                        {{ Form::textarea('content', $model->content, ['size' => '100x15', 'id' => 'editor1']) }}
                                    </div>
                                </div>
                                <!-- /.box -->
                            </div>
                        </div>
                    </div>
                    <div class="text-center form-group row">
                        <a href="{{ route('post.index') }}" class="btn btn-danger">{{ trans('auth.cancel') }}</a>
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

@include('user.admin.post.js')

@endsection
