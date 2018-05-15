@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{!! trans('auth.register') !!}</div>

                <div class="panel-body">
                    {!! Form::open(['method' => 'POST', 'url' => 'register', 'class' => 'form-horizontal']) !!}
                        {{-- Name --}}
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            {!! Form::label('name', trans('auth.name'), ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::text('name', '', ['class' => 'form-control', 'id' => 'name'] ) !!}
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        {{-- Email --}}
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            {!! Form::label('email', trans('auth.email'), ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::text('email', '', ['class' => 'form-control', 'id' => 'email'] ) !!}
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        {{-- Password --}}
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            {!! Form::label('password', trans('auth.password'), ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                 {!! Form::password('password', '' , ['class' => 'form-control'], ['id' => 'password']) !!}
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        {{-- Confirm Password --}}
                        <div class="form-group">
                            {!! Form::label('password-confirm', trans('auth.password_confirm'), ['class' => 'col-md-4 control-label']) !!}

                            <div class="col-md-6">
                                {!! Form::password('password_confirmation', '' , ['class' => 'form-control'], ['id' => 'password-confirm']) !!}
                            </div>
                        </div>
                        {{-- Phone --}}
                         <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                            {!! Form::label('phone', trans('auth.phone'), ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::text('phone', '', ['class' => 'form-control', 'id' => 'phone'] ) !!}
                                @if ($errors->has('phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        {{-- Address --}}
                         <div class="form-group{{ $errors->has('add') ? ' has-error' : '' }}">
                            {!! Form::label('add', trans('auth.address'), ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::text('address', '', ['class' => 'form-control', 'id' => 'address'] ) !!}
                                @if ($errors->has('add'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('add') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        {{-- Submit --}}
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                {!! Form::submit(trans('auth.register'), ['class' => 'btn btn-primary']) !!}
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
