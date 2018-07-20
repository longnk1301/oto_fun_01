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
                {{ trans('auth.edit_user') }}
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i>{{ trans('auth.dashboard') }}</a></li>
                <li><a href="{{ route('user.index') }}">{{ trans('auth.users') }}</a></li>
                <li class="active">{{ trans('auth.edit_user') }}</li>
            </ol>
        </section>
            <section class="panel panel-default">


                <div class="panel-body">
                    {!! Form::open(['method' => 'PUT', 'route' => 'user.save', 'class' => 'form-horizontal', 'id' => 'user-form', 'enctype' => 'multipart/form-data']) !!}
                        <div class="col-sm-6">
                            <div class="form-group">
                                {!! Form::hidden('id', $user->id) !!}
                                {!! Form::hidden('role_user', $user->role) !!}
                                {!! Form::label('name', trans('auth.fullname')) !!}
                                {!! Form::text('name', $user->name, ['class'=>'form-control input-lg','required', 'disabled']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('email', trans('auth.email')) !!}
                                {!! Form::text('email', $user->email, ['class'=>'form-control input-lg','required', 'disabled']) !!}
                            </div>
                        </div>
                        <div class="col-sm-5 col-sm-offset-1">
                            <div class="form-group">
                                {!! Form::label('add', trans('auth.add')) !!}
                                {!! Form::text('add', $user->add, ['class'=>'form-control input-lg', 'required', 'disabled']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('phone', trans('auth.phone')) !!}
                                {!! Form::text('phone', $user->phone, ['class'=>'form-control input-lg', 'required', 'disabled']) !!}
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="line line-dashed line-lg pull-in"></div>
                            <div class="row">
                                <div class="form-group">
                                    <label class="col-sm-2">{{ trans('auth.role') }}</label>
                                    <div class="col-sm-10 ">
                                        <label class="radio-custom col-md-2 input-md">
                                            {!! Form::radio('role', 900, $checked == 'Admin') !!}
                                            {{ trans('auth.admin') }}
                                        </label>
                                        <label class="radio-custom col-md-2 input-md">
                                            {!! Form::radio('role', 300, $checked == 'Author') !!}
                                            {{ trans('auth.author') }}
                                        </label>
                                        <label class="radio-custom col-md-2 input-md">
                                            {!! Form::radio('role', 100, $checked == 'Member') !!}
                                            {{ trans('auth.member') }}
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="line line-dashed line-lg pull-in"></div>
                            <a href="{{ route('user.index') }}" class="btn btn-danger">{{ trans('auth.cancel') }}</a>
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
