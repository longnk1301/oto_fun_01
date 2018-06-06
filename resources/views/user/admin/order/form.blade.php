@extends('layouts.app')

@section('content')
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <ul class="sidebar-menu">
            <li class="header">{!! trans('auth.main') !!}</li>
            <li class="nav-item has-treeview menu-open">
                <a href="{{ route('home') }}" class="nav-link active">
                    <i class="nav-icon fa fa-dashboard"></i>
                    {{ trans('auth.dashboard') }}
              </a>
            </li>
            <li class="treeview">
                <a href="{{ route('cate.index') }}">
                    <i class="fa fa-edit"></i> <span>{{ trans('auth.categories') }}</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
            </li>

            <li class="treeview">
                <a href="{{ route('post.index') }}">
                    <i class="fa fa-file-text-o"></i> <span>{{ trans('auth.posts') }}</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
            </li>

            <li class="treeview">
                <a href="{{ route('product.index') }}">
                    <i class="fa fa-car"></i> <span>{{ trans('auth.products') }}</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
            </li>

            <li class="treeview">
                <a href="{{ route('order.index') }}">
                    <i class="fa fa-cart-plus"></i> <span>{{ trans('auth.orders') }}</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
            </li>

            <li class="treeview">
                <a href="{{ route('user.index') }}">
                    <i class="fa fa-user-o"></i> <span>{{ trans('auth.users') }}</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
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
                        <div class="row">
                            <div class="form-group row">
                                {!! Form::hidden('car_id', $advisory->car_id) !!}
                                {!! Form::hidden('id', $advisory->id) !!}
                                {!! Form::label('cus_name', trans('auth.cus_name'), ['class' => 'col-md-2 control-label']) !!}
                                <div class="col-md-4">
                                    {!! Form::text('cus_name', $advisory->cus_name, ['class'=>'form-control','required', 'disabled']) !!}
                                </div>
                                {!! Form::label('cus_phone', trans('auth.phone'), ['class' => 'col-md-1 control-label']) !!}
                                <div class="col-md-4">
                                    {!! Form::text('cus_phone', $advisory->cus_phone, ['class'=>'form-control','required', 'disabled']) !!}
                                </div>
                            </div>

                            <div class="form-group row">
                                {!! Form::label('cus-add', trans('auth.add'), ['class' => 'col-md-2 control-label']) !!}
                                <div class="col-md-4">
                                    {!! Form::text('cus_add', $advisory->cus_add, ['class'=>'form-control', 'required', 'disabled']) !!}
                                </div>
                                {!! Form::label('cus_email', trans('auth.email'), ['class' => 'col-md-1 control-label']) !!}
                                <div class="col-md-4">
                                    {!! Form::text('cus_email', $advisory->cus_email, ['class'=>'form-control', 'required', 'disabled']) !!}
                                </div>
                            </div>

                            <div class="form-group row">
                                {!! Form::label('identification', trans('auth.identification'), ['class' => 'col-md-2 control-label']) !!}
                                <div class="col-md-4">
                                    {!! Form::text('identification', $advisory->identification, ['class'=>'form-control', 'required', 'disabled']) !!}
                                </div>
                                {!! Form::label('car_name', trans('auth.car_name'), ['class' => 'col-md-1 control-label']) !!}
                                <div class="col-md-4">
                                    {!! Form::text('car_name', $car->car_name, ['class'=>'form-control','required', 'disabled']) !!}
                                </div>
                            </div>

                            <div class="form-group row">
                                {!! Form::label('color', trans('index.car_color'), ['class' => 'col-md-2 control-label']) !!}
                                <div class="col-md-4">
                                    {!! Form::text('color', $colors->color, ['class'=>'form-control', 'required', 'disabled']) !!}
                                </div>
                                {!! Form::label('type', trans('index.car_type'), ['class' => 'col-md-1 control-label']) !!}
                                <div class="col-md-4">
                                    {!! Form::text('type', $types->type, ['class'=>'form-control', 'required', 'disabled']) !!}
                                </div>
                            </div>

                            <div class="form-group row">
                                {!! Form::label('company', trans('auth.company'), ['class' => 'col-md-2 control-label']) !!}
                                <div class="col-md-4">
                                    {!! Form::text('company', $companys->com_name, ['class'=>'form-control', 'required', 'disabled']) !!}
                                </div>
                            </div>
                            <div class="form-group row">
                                {!! Form::label('content', trans('auth.content'), ['class' => 'col-md-2 control-label']) !!}
                                <div class="col-md-6">
                                    {!! Form::textarea('content', $advisory->content, ['class'=>'form-control', 'required', 'disabled']) !!}
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="line line-dashed line-lg pull-in"></div>
                            <div class="row">
                                <div class="form-group">
                                    <label class="col-sm-2">{{ trans('auth.status') }}</label>
                                    <div class="col-sm-10 ">
                                        <label class="radio-custom col-md-2 input-md">
                                            {!! Form::radio('status', 'Pending', $checked == 'Pending') !!}
                                            {{ trans('auth.pending') }}
                                        </label>

                                        <label class="radio-custom col-md-2 input-md">
                                            {!! Form::radio('status', 'Confirm', $checked == 'Confirm') !!}
                                            {{ trans('auth.confirm') }}
                                        </label>

                                        <label class="radio-custom col-md-2 input-md">
                                            {!! Form::radio('status', 'Ready', $checked == 'Ready') !!}
                                            {{ trans('auth.item_ready') }}
                                        </label>

                                        <label class="radio-custom col-md-2 input-md">
                                            {!! Form::radio('status', 'Cancelled', $checked == 'Cancelled') !!}
                                            {{ trans('auth.cancelled') }}
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="line line-dashed line-lg pull-in"></div>
                            <a href="{{ route('order.index') }}" class="btn btn-danger">{{ trans('auth.cancel') }}</a>
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
