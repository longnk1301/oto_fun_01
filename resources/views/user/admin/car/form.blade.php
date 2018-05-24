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
        </ul>
    </section>
<!-- /.sidebar -->
</aside>

<div class="content-wrapper bg-color">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1 class="color-text">
            {{ trans('auth.add_category') }}
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i>{{ trans('auth.dashboard') }}</a></li>
            <li><a href="{{ route('product.index') }}">{{ trans('auth.products') }}</a></li>
            <li class="active">{{ trans('auth.add') }}</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            {!! Form::open(['method' => 'POST', 'route' => 'product.save', 'class' => 'form-horizontal', 'id' => 'product-form', 'enctype' => 'multipart/form-data']) !!}
                {!! Form::hidden('id', $model->id) !!}
                <div class="col-md-6">
                    <div class="form-group row">
                        {!! Html::decode(Form::label('car_name', trans('index.car_name') . '<span class="text-danger"> *</span>', ['class' => 'col-md-4 control-label'])) !!}
                        <div class="col-md-8">
                            {!! Form::text('car_name', $model->car_name , ['class' => 'form-control', 'id' => 'carName', 'placeholder' => trans('auth.ex_name')]) !!}
                        </div>
                    </div>

                    <div class="form-group row">
                        {!! Html::decode(Form::label('car_type', trans('index.car_type'), ['class' => 'col-md-4 control-label'])) !!}
                        <div class="col-md-8">
                            {!! Form::text('car_type', $model->car_type, ['class' => 'form-control', 'placeholder' => trans('auth.ex_type')]) !!}
                        </div>
                    </div>

                    <div class="form-group row">
                        {!! Html::decode(Form::label('car_company', trans('auth.company')   , ['class' => 'col-md-4 control-label'])) !!}
                        <div class="col-md-8">
                            {!! Form::text('car_company', $model->car_company, ['class' => 'form-control', 'placeholder' => trans('auth.ex_type')]) !!}
                        </div>
                    </div>

                    <div class="form-group row">
                        {!! Html::decode(Form::label('car_number', trans('auth.car_number') . '<span class="text-danger"> *</span>', ['class' => 'col-md-4 control-label'])) !!}
                        <div class="col-md-8">
                            {!! Form::text('car_number', $model->car_number, ['class' => 'form-control', 'placeholder' => trans('auth.ex_mileage')]) !!}
                        </div>
                    </div>

                    <div class="form-group row">
                        {!! Html::decode(Form::label('car_cost', trans('auth.cost') . '<span class="text-danger"> *</span>', ['class' => 'col-md-4 control-label'])) !!}
                        <div class="col-md-8">
                            {!! Form::text('car_cost', $model->car_cost, ['class' => 'form-control', 'placeholder' => trans('auth.ex_mileage')]) !!}
                        </div>
                    </div>

                    <div class="form-group row">
                        {!! Html::decode(Form::label('car_years', trans('index.year') . '<span class="text-danger"> *</span>', ['class' => 'col-md-4 control-label'])) !!}
                        <div class="col-md-8">
                            {!! Form::text('car_years', $model->car_years, ['class' => 'form-control', 'placeholder' => trans('auth.ex_year')]) !!}
                        </div>
                    </div>

                    <div class="form-group row">
                        {!! Html::decode(Form::label('tags', trans('auth.tags') . '<span class="text-danger"> *</span>', ['class' => 'col-md-4 control-label'])) !!}
                        <div class="col-md-8">
                            {!! Form::text('tags', $model->tags, ['class' => 'form-control', 'placeholder' => trans('auth.ex_tags')]) !!}
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-offset-6">
                            <img src="
                                    @if($model->car_image == "")
                                        {{ asset('images/products/product-1.webp') }}
                                    @else
                                        {{ asset($model->car_image) }}
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

                    <section class="content-header">
                        <h1 class="color-text">
                            {{ trans('index.vo') }}
                        </h1>
                    </section>

                    <div class="form-group row">
                        {!! Html::decode(Form::label('interior_color', trans('index.in_color') . '<span class="text-danger"> *</span>', ['class' => 'col-md-3 control-label text-right'])) !!}
                        <div class="col-md-3">
                            {!! Form::text('interior_color', $vehicle->interior_color, ['class' => 'form-control ', 'placeholder' => trans('auth.ex_interior')]) !!}
                        </div>

                        {!! Html::decode(Form::label('exterior_color', trans('index.ex_color') . '<span class="text-danger"> *</span>', ['class' => 'col-md-3 control-label text-right'])) !!}
                        <div class="col-md-3">
                            {!! Form::text('exterior_color', $vehicle->exterior_color, ['class' => 'form-control', 'placeholder' => trans('auth.ex_exterior')]) !!}
                        </div>
                    </div>

                    <div class="form-group row">
                        {!! Html::decode(Form::label('transmission', trans('index.trans') . '<span class="text-danger"> *</span>', ['class' => 'col-md-3 control-label text-right'])) !!}
                        <div class="col-md-3">
                            {!! Form::text('transmission', $vehicle->transmission, ['class' => 'form-control', 'placeholder' => trans('auth.ex_trans')]) !!}
                        </div>

                        {!! Html::decode(Form::label('engine', trans('index.engine') . '<span class="text-danger"> *</span>', ['class' => 'col-md-3 control-label text-right'])) !!}
                        <div class="col-md-3">
                            {!! Form::text('engine', $vehicle->engine, ['class' => 'form-control', 'placeholder' => trans('auth.ex_engine')]) !!}
                        </div>
                    </div>

                    <div class="form-group row">
                        {!! Html::decode(Form::label('mileage', trans('index.mileage'), ['class' => 'col-md-3 control-label text-right'])) !!}
                        <div class="col-md-3">
                            {!! Form::text('mileage', $vehicle->mileage, ['class' => 'form-control', 'placeholder' => trans('auth.ex_mileage')]) !!}
                        </div>

                        {!! Html::decode(Form::label('fuel_type', trans('index.fuel') . '<span class="text-danger"> *</span>', ['class' => 'col-md-3 control-label text-right'])) !!}
                        <div class="col-md-3">
                            {!! Form::text('fuel_type', $vehicle->fuel_type, ['class' => 'form-control', 'placeholder' => trans('auth.ex_fuel')]) !!}
                        </div>
                    </div>

                    <div class="form-group row">
                        {!! Html::decode(Form::label('drive_type', trans('index.drive') . '<span class="text-danger"> *</span>', ['class' => 'col-md-3 control-label text-right'])) !!}
                        <div class="col-md-3">
                            {!! Form::text('drive_type', $vehicle->drive_type, ['class' => 'form-control', 'placeholder' => trans('auth.ex_drive')]) !!}
                        </div>

                        {!! Html::decode(Form::label('mpg', trans('index.mpg') . '<span class="text-danger"> *</span>', ['class' => 'col-md-3 control-label text-right'])) !!}
                        <div class="col-md-3">
                            {!! Form::text('mpg', $vehicle->mpg, ['class' => 'form-control', 'placeholder' => trans('auth.ex_mpg')]) !!}
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
                                    <form>
                                        {{ Form::textarea('summary', $model->summary, ['size' => '80x10', 'id' => 'editor1']) }}
                                    </form>
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

@include('user.admin.car.js')

@endsection
