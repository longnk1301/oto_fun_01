@extends('layouts.app')

@section('content')
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset(Auth::user()->avatar) }}" class="img-circle" alt="{!! trans('auth.used_image') !!}" />
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
    <section class="content-header bg-white">
        <h1 class="color-text">
            {{ trans('auth.add_product') }}
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i>{{ trans('auth.dashboard') }}</a></li>
            <li><a href="{{ route('product.index') }}">{{ trans('auth.products') }}</a></li>
            <li class="active">{{ trans('auth.add') }}</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content bg-white">
        <div class="row">
            {!! Form::open(['method' => 'POST', 'route' => 'product.save', 'class' => 'form-horizontal', 'id' => 'product-form', 'enctype' => 'multipart/form-data']) !!}
                {!! Form::hidden('id', $car->id) !!}
                    <div class="form-group row">
                        {!! Html::decode(Form::label('car_name', trans('index.car_name') . '<span class="text-danger"> *</span>', ['class' => 'col-md-2 control-label'])) !!}
                        <div class="col-md-3">
                            {!! Form::text('car_name', $car->car_name , ['class' => 'form-control', 'id' => 'carName', 'placeholder' => trans('auth.ex_name')]) !!}
                        </div>

                        {!! Html::decode(Form::label('', trans('index.car_color') . '<span class="text-danger"> *</span>', ['class' => 'col-md-1 control-label'])) !!}
                        <div class="col-md-2">
                                {!! Form::select(
                                    'color',
                                    $car_color,
                                    $colored,
                                    ['class' => 'form-control']) !!}
                        </div>

                        {!! Html::decode(Form::label('gear', trans('auth.gear') . '<span class="text-danger"> *</span>', ['class' => 'col-md-1 control-label'])) !!}
                            <div class="col-md-2">
                                {!! Form::text('gear', $operates->gear , ['class' => 'form-control']) !!}
                            </div>
                    </div>

                    <div class="form-group row">
                        {!! Html::decode(Form::label('', trans('index.car_type') . '<span class="text-danger"> *</span>', ['class' => 'col-md-2 control-label'])) !!}
                        <div class="col-md-2">
                                {!! Form::select(
                                    'type',
                                    $types,
                                    $typed,
                                    ['class' => 'form-control']) !!}
                        </div>

                        {!! Html::decode(Form::label('', trans('auth.company') . '<span class="text-danger"> *</span>', ['class' => 'col-md-2 control-label'])) !!}
                       <div class="col-md-2">
                                {!! Form::select(
                                    'com_name',
                                    $car_company,
                                    $companyed,
                                    ['class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group row">
                        {!! Html::decode(Form::label('car_number', trans('auth.car_number') . '<span class="text-danger"> *</span>', ['class' => 'col-md-2 control-label'])) !!}
                        <div class="col-md-1">
                            {!! Form::text('car_number', $car->car_number, ['class' => 'form-control']) !!}
                        </div>

                        {!! Html::decode(Form::label('drive_type', trans('auth.drive_type') . '<span class="text-danger"> *</span>', ['class' => 'col-md-2 control-label'])) !!}
                        <div class="col-md-2">
                            {!! Form::text('drive_type', $engines->drive_type , ['class' => 'form-control']) !!}
                        </div>

                        {!! Html::decode(Form::label('drive_style', trans('auth.drive_style') . '<span class="text-danger"> *</span>', ['class' => 'col-md-2 control-label'])) !!}
                        <div class="col-md-2">
                            {!! Form::text('drive_style', $engines->drive_style , ['class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group row">
                        {!! Html::decode(Form::label('car_cost', trans('auth.cost') . '<span class="text-danger"> *</span>', ['class' => 'col-md-2 control-label'])) !!}
                        <div class="col-md-2">
                            {!! Form::text('car_cost', $car->car_cost, ['class' => 'form-control']) !!}
                        </div>

                        {!! Html::decode(Form::label('car_year', trans('index.year') . '<span class="text-danger"> *</span>', ['class' => 'col-md-1 control-label'])) !!}
                        <div class="col-md-2">
                            {!! Form::text('car_year', $car->car_year, ['class' => 'form-control', 'placeholder' => trans('auth.ex_year')]) !!}
                        </div>
                    </div>

                    <div class="form-group row">
                            <label class="col-md-2 col-md-offset-1">{{ trans('auth.status') }}</label>
                                <label class="radio-custom col-md-2 input-md">
                                    {!! Form::radio('status', 'UnPublic', $status == 'UnPublic') !!}
                                    {{ trans('auth.unpublic') }}
                                </label>
                                <label class="radio-custom col-md-2 input-md">
                                    {!! Form::radio('status', 'Public', $status == 'Public') !!}
                                    {{ trans('auth.public') }}
                                </label>
                        </div>

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
                    </div>

                    <div class="form-group row">
                            {!! Html::decode(Form::label('height', trans('auth.height') . '<span class="text-danger"> *</span>', ['class' => 'col-md-2 control-label'])) !!}
                            <div class="col-md-2">
                                {!! Form::text('height', $sizes->height , ['class' => 'form-control']) !!}
                            </div>

                            {!! Html::decode(Form::label('weight', trans('auth.weight') . '<span class="text-danger"> *</span>', ['class' => 'col-md-1 control-label'])) !!}
                            <div class="col-md-2">
                                {!! Form::text('weight', $sizes->weight , ['class' => 'form-control']) !!}
                            </div>

                            {!! Html::decode(Form::label('width', trans('auth.width') . '<span class="text-danger"> *</span>', ['class' => 'col-md-1 control-label'])) !!}
                            <div class="col-md-2">
                                {!! Form::text('width', $sizes->width , ['class' => 'form-control']) !!}
                            </div>
                        </div>

                    <div class="form-group row">
                        {!! Html::decode(Form::label('engine_type', trans('auth.engine_type') . '<span class="text-danger"> *</span>', ['class' => 'col-md-2 control-label'])) !!}
                        <div class="col-md-2">
                            {!! Form::text('engine_type', $engines->engine_type , ['class' => 'form-control']) !!}
                        </div>

                        {!! Html::decode(Form::label('tissue_man', trans('auth.tissue_men') . '<span class="text-danger"> *</span>', ['class' => 'col-md-2 control-label'])) !!}
                        <div class="col-md-2">
                            {!! Form::text('tissue_man', $operates->tissue_man , ['class' => 'form-control']) !!}
                        </div>

                        {!! Html::decode(Form::label('colc', trans('auth.colc'), ['class' => 'col-md-1 control-label'])) !!}
                        <div class="col-md-2">
                            {!! Form::text('colc', $sizes->colc , ['class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group row">
                        {!! Html::decode(Form::label('max_capacity', trans('auth.max_capacity') . '<span class="text-danger"> *</span>', ['class' => 'col-md-2 control-label'])) !!}
                        <div class="col-md-3">
                            {!! Form::text('max_capacity', $engines->max_capacity , ['class' => 'form-control']) !!}
                        </div>

                        {!! Html::decode(Form::label('cylinder_capacity', trans('auth.cylinder_capacity') . '<span class="text-danger"> *</span>', ['class' => 'col-md-2 control-label'])) !!}
                        <div class="col-md-3">
                            {!! Form::text('cylinder_capacity', $engines->cylinder_capacity , ['class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group row">
                        {!! Html::decode(Form::label('volume_fuel', trans('auth.volume_fuel'), ['class' => 'col-md-2 control-label'])) !!}
                        <div class="col-md-3">
                            {!! Form::text('volume_fuel', $sizes->volume_fuel , ['class' => 'form-control']) !!}
                        </div>
                        {!! Html::decode(Form::label('turn_signal_light', trans('auth.turn_light') . '<span class="text-danger"> *</span>', ['class' => 'col-md-2 control-label'])) !!}
                        <div class="col-md-3">
                            {!! Form::text('turn_signal_light', $exteriors->turn_signal_light , ['class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group row">
                        {!! Html::decode(Form::label('locks_nearby', trans('auth.locksner') . '<span class="text-danger"> *</span>', ['class' => 'col-md-2 control-label'])) !!}
                        <div class="col-md-3">
                            {!! Form::text('locks_nearby', $exteriors->locks_nearby, ['class' => 'form-control']) !!}
                        </div>

                        {!! Html::decode(Form::label('locks_remote', trans('auth.locksremote') . '<span class="text-danger"> *</span>', ['class' => 'col-md-2 control-label'])) !!}
                        <div class="col-md-3">
                            {!! Form::text('locks_remote', $exteriors->locks_remote , ['class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group row">
                            <div class="col-md-8 col-md-offset-2">
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
                                            {{ Form::textarea('summary', $car->summary, ['size' => '120x10', 'id' => 'editor1']) }}
                                        </form>
                                    </div>
                                </div>
                                <!-- /.box -->
                            </div>
                        </div>

                        <div class="text-center">
                            <a href="{{ route('product.index') }}" class="btn btn-danger">{{ trans('auth.cancel') }}</a>
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
