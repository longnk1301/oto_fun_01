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
                    <li><a href="{{ route('post.index') }}"><i class="fa fa-circle-o nav-icon"></i>{{ trans('auth.list_posts') }}</a></li>
                    <li><a href="{{ route('post.add') }}"><i class="fa fa-circle-o nav-icon"></i>{{ trans('auth.add_post') }}</a></li>
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
    <div class="col-md-8 col-md-offset-2">
        <h2>Thong tin tai khoan</h2>
        <div class="panel-body  panel">
            {!! Form::open(['method' => 'POST', 'route' => 'admin.profile', 'class' => 'form-horizontal']) !!}
                {!! Form::hidden('_token', csrf_token()) !!}
                @if (session('msg'))
                    <div class="alert alert-danger">
                        <span>{{ session('msg') }}</span>
                    </div>
                @endif
                <div class="form-group">
                    {!! Form::label('name', trans('auth.fullname'), ['class' => 'col-md-4 control-label']) !!}
                    <div class="col-md-6">
                        {!! Form::text('name', $user->name, ['class' => 'form-control', 'id' => 'name'] ) !!}
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::label('email', trans('auth.email'), ['class' => 'col-md-4 control-label']) !!}
                    <div class="col-md-6">
                        {!! Form::text('email', $user->email, ['class' => 'form-control', 'id' => 'email', 'readonly'] ) !!}
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::checkbox('checkpassword', '1', false, array('id' => 'changePassword')) !!}
                    {!! Form::label('password', trans('auth.password'), array('class' => 'col-md-4 control-label')) !!}
                    <div class="col-md-6">
                        {!! Form::password('password', array('class' => 'form-control password', 'id' => 'password', 'disabled')) !!}
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::label('password', trans('auth.password_confirm'), ['class' => 'password col-md-4 control-label']) !!}
                    <div class="col-md-6">
                        {!! Form::password('password_confirmation', array('class' => 'form-control password', 'id' => 'password', 'disabled')) !!}
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::label('phone', trans('auth.phone'), ['class' => 'col-md-4 control-label']) !!}
                    <div class="col-md-6">
                        {!! Form::text('phone', $user->phone, ['class' => 'form-control', 'id' => 'phone'] ) !!}
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::label('add', trans('auth.address'), ['class' => 'col-md-4 control-label']) !!}
                    <div class="col-md-6">
                        {!! Form::text('add', $user->add, ['class' => 'form-control', 'id' => 'address'] ) !!}
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-6 col-md-offset-6">
                        {!! Form::submit(trans('auth.edit'), ['class' => 'btn btn-primary']) !!}
                    </div>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
    $(document).ready(function() {
        $('#changePassword').change(function() {
            if($(this).is(':checked')) {
                $('.password').removeAttr('disabled');
            } else {
                $('.password').attr('disabled');
            }
        });
    });
</script>
@endsection
