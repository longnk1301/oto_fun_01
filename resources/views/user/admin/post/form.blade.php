@extends('layouts.app')

@section('content')

<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset('images/user.jpg') }}" class="img-circle" alt="{!! trans('auth.used_image') !!}" />
            </div>
            <div class="pull-left info">
                <p>{{ Auth::user()->name }}</p>
                <a href="#"><i class="fa fa-circle text-success"></i>{!! trans('auth.ol') !!}</a>
            </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">{!! trans('auth.main') !!}</li>
            <li class="nav-item has-treeview menu-open">
                <a href="{{ route('home') }}" class="nav-link active">
                    <i class="nav-icon fa fa-dashboard"></i>
                        {{ trans('auth.dashboard') }}
                </a>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-edit"></i> <span>{{ trans('auth.categories') }}</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('cate.index') }}"><i class="fa fa-circle-o"></i>{{ trans('auth.list_categories') }}</a></li>
                    <li><a href="{{ route('cate.add') }}"><i class="fa fa-circle-o"></i>{{ trans('auth.add_category') }}</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-file-text-o"></i> <span>{{ trans('auth.posts') }}</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('post.index') }}"><i class="fa fa-circle-o"></i>{{ trans('auth.list_posts') }}</a></li>
                    <li><a href="{{ route('post.add') }}"><i class="fa fa-circle-o"></i>{{ trans('auth.add_post') }}</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-car"></i> <span>{{ trans('auth.products') }}</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('product.index') }}"><i class="fa fa-circle-o nav-icon"></i>{{ trans('auth.list_products') }}</a></li>
                    <li><a href="{{ route('product.add') }}"><i class="fa fa-circle-o nav-icon"></i>{{ trans('auth.add_product') }}</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-cart-plus"></i> <span>{{ trans('auth.orders') }}</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('order.index') }}"><i class="fa fa-circle-o nav-icon"></i>{{ trans('auth.list_orders') }}</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-user-o"></i> <span>{{ trans('auth.users') }}</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('user.index') }}"><i class="fa fa-circle-o nav-icon"></i>{{ trans('auth.list_users') }}</a></li>
                </ul>
            </li>
        </ul>
    </section>
<!-- /.sidebar -->
</aside>

<div class="content-wrapper bg-color">
    <!-- Content Header (Page header) -->
    <section class="content-header">
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
    <section class="content">
        <div class="row">
            {!! Form::open(['method' => 'POST', 'route' => 'post.save', 'class' => 'form-horizontal', 'id' => 'post-form', 'enctype' => 'multipart/form-data']) !!}
                {!! Form::hidden('id', $model->id) !!}
                <div>
                    <div class="col-md-5 mg-top">
                        <div class="form-group row">
                            {!! Html::decode(Form::label('title', trans('auth.title') . '<span class="text-danger"> *</span>', ['class' => 'col-md-4 control-label'])) !!}
                            <div class="col-md-8">
                                {!! Form::text('title', $model->title , ['class' => 'form-control', 'id' => 'title', 'placeholder' => trans('auth.title')]) !!}
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
                            {!! Html::decode(Form::label('tags', trans('auth.tags') . '<span class="text-danger"> *</span>', ['class' => 'col-md-4 control-label'])) !!}
                            <div class="col-md-8">
                                {!! Form::text('tags', $model->tags , ['class' => 'form-control', 'placeholder' => trans('auth.ex_tags')]) !!}
                            </div>
                        </div>

                        <div class="form-group row">
                            {!! Html::decode(Form::label('', trans('auth.category_name') . '<span class="text-danger"> *</span>', ['class' => 'col-md-4 control-label'])) !!}
                       <div class="col-md-8">
                            {!! Form::select(
                                    'cate_id',
                                    $select,
                                    $selected,
                                    ['class' => 'form-control']) !!}
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-offset-5">
                                <img src="
                                        @if($model->image == "")
                                            {{ asset('images/products/product-1.webp') }}
                                        @else
                                            {{ asset($model->image) }}
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

                    <div class="col-md-7">
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
                                        {{ Form::textarea('summary', $model->summary, ['size' => '80x10', 'class' => 'ckeditor']) }}
                                    </div>
                                </div>
                                <!-- /.box -->
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-11 col-md-offset-1">
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
                                        {{ Form::textarea('content', $model->content, ['size' => '80x10', 'class' => 'ckeditor']) }}
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
