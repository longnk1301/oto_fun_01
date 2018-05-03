@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{!! trans('auth.login') !!}</div>

                <div class="panel-body">
                    {!! Form::open(['method' => 'POST', 'url' => 'logincheck', 'class' => 'form-horizontal']) !!}
                        {{ csrf_field() }}
                        {{-- UserName --}}
                       <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                           {!! Form::label('email', trans('auth.name'), ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::text('name', '' , ['class' => 'form-control', 'id' => 'email']) !!}
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
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
                        {{-- Remember Me --}}
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    {!! Form::checkbox('remember', '' , false) !!}
                                    {!! Form::label('', trans('auth.remember')) !!}
                                </div>
                            </div>
                        </div>
                        {{-- Forgot --}}
                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                 {!! Form::submit( trans('auth.login'), ['class' => 'btn btn-primary']) !!}
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {!! trans('auth.forgot') !!}
                                </a>
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
