@extends('layouts.index')

@section('content')
<div class="container post clearfix">
    <div class="row">
        <div class="row mg">
            <h2>Thong tin tai khoan</h2>
        <div class="panel-body  panel">
            {!! Form::open(['method' => 'POST', 'route' => 'admin.profile', 'class' => 'form-horizontal']) !!}
                {!! Form::hidden('_token', csrf_token()) !!}
                @if (session('msg'))
                    <div class="alert alert-success">
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
</div>
@endsection

@section('script')
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
