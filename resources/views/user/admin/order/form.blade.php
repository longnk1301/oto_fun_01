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
        </ul>
    </section>
<!-- /.sidebar -->
</aside>

<div class="content-wrapper bg-color">
    <!-- Content Header (Page header) -->
    <section class="vbox">
        <section class="scrollable padder">
            <section class="content-header">
            <h1 class="color-text">
                {{ trans('auth.edit_orders') }}
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i>{{ trans('auth.dashboard') }}</a></li>
                <li><a href="{{ route('order.index') }}">{{ trans('auth.orders') }}</a></li>
                <li class="active">{{ trans('auth.edit_orders') }}</li>
            </ol>
        </section>
            <section class="panel panel-default">


                <div class="panel-body">
                    {!! Form::open(['method' => 'PUT', 'route' => 'order.save', 'class' => 'form-horizontal', 'id' => 'order-form', 'enctype' => 'multipart/form-data']) !!}
                        <div class="col-sm-6">
                            <div class="form-group">
                                {!! Form::hidden('car_id', $order->car_id) !!}
                                {!! Form::hidden('id', $order->id) !!}
                                {!! Form::label('cus_name', trans('auth.cus_name')) !!}
                                {!! Form::text('cus_name', $order->cus_name, ['class'=>'form-control input-lg','required', 'disabled']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('cus_phone', trans('auth.phone')) !!}
                                {!! Form::text('cus_phone', $order->cus_phone, ['class'=>'form-control input-lg','required', 'disabled']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('cus-add', trans('auth.add')) !!}
                                {!! Form::text('cus_add', $order->cus_add, ['class'=>'form-control input-lg', 'required', 'disabled']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('cus_email', trans('auth.email')) !!}
                                {!! Form::text('cus_email', $order->cus_email, ['class'=>'form-control input-lg', 'required', 'disabled']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('cus_zip', trans('auth.zipcode')) !!}
                                {!! Form::text('cus_zip', $order->cus_zip, ['class'=>'form-control input-lg', 'required', 'disabled']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('identification', trans('auth.identification')) !!}
                                {!! Form::text('identification', $order->identification, ['class'=>'form-control input-lg', 'required', 'disabled']) !!}
                            </div>
                        </div>
                        <div class="col-sm-5 col-sm-offset-1">
                            <div class="form-group">
                                {!! Form::label('car_name', trans('auth.car_name')) !!}
                                {!! Form::text('car_name', $car->car_name, ['class'=>'form-control input-lg','required', 'disabled']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('interior_color', trans('index.in_color')) !!}
                                {!! Form::text('interior_color', $vehicle->interior_color, ['class'=>'form-control input-lg', 'required', 'disabled']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('exterior_color', trans('index.ex_color')) !!}
                                {!! Form::text('exterior_color', $vehicle->exterior_color, ['class'=>'form-control input-lg', 'required', 'disabled']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('content', trans('auth.content')) !!}
                                {!! Form::textarea('content', $order->content, ['class'=>'form-control input-lg', 'required', 'disabled']) !!}
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="line line-dashed line-lg pull-in"></div>
                            <div class="row">
                                <div class="form-group">
                                    <label class="col-sm-2">{{ trans('auth.status') }}</label>
                                    <div class="col-sm-10 ">
                                        <label class="radio-custom col-md-2 input-md">
                                            {!! Form::radio('order_status', 'Confirm', $checked == 'Confirm') !!}
                                            {{ trans('auth.confirm') }}
                                        </label>
                                        <label class="radio-custom col-md-2 input-md">
                                            {!! Form::radio('order_status', 'Ready', $checked == 'Ready') !!}
                                            {{ trans('auth.item_ready') }}
                                        </label>
                                        <label class="radio-custom col-md-2 input-md">
                                            {!! Form::radio('order_status', 'Send', $checked == 'Send') !!}
                                            {{ trans('auth.send') }}
                                        </label>
                                        <label class="radio-custom col-md-2 input-md">
                                            {!! Form::radio('order_status', 'Delivered', $checked == 'Delivered') !!}
                                            {{ trans('auth.delivered') }}
                                        </label>
                                        <label class="radio-custom col-md-2 input-md">
                                            {!! Form::radio('order_status', 'Returned', $checked == 'Returned') !!}
                                            {{ trans('auth.returned') }}
                                        </label>
                                        <label class="radio-custom col-md-2 input-md">
                                            {!! Form::radio('order_status', 'Cancelled', $checked == 'Cancelled') !!}
                                            {{ trans('auth.cancelled') }}
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="line line-dashed line-lg pull-in"></div>
                            {!! Form::submit('Submit', [ 'class'=>'btn btn-info']) !!}
                        </div>
                    {!! Form::close() !!}
                </div>
            </section>
        </section>
    </section>
</div>
@endsection

@section('js')

@endsection
