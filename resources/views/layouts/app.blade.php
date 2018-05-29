<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{!! trans('index.ad') !!}</title>

    <!-- Styles -->
    @include('user.admin.sub.css')

</head>
<body class="skin-green sidebar-mini">
    <div class="wrapper">
        <header class="main-header">
        <!-- Logo -->
            <a href="{{ url('/') }}" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><b>FC</b></span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><b>{!! trans('auth.fc') !!}</b></span>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">{!! trans('auth.tog') !!}</span>
                </a>
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                     <!-- Authentication Links -->
                    @guest
                        <li><a href="{{ route('login') }}">{!! trans('auth.login') !!}</a></li>
                        <li><a href="{{ route('register') }}">{!! trans('auth.register') !!}</a></li>
                    @else
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="{{ asset('images/user.jpg') }}" class="user-image" alt="User Image" />
                                <span class="hidden-xs">{{ Auth::user()->name }}</span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header">
                                    <img src="{{ asset('images/user.jpg') }}" class="img-circle" alt="User Image"/>
                                    <p>
                                      {!! trans('index.ad') !!}
                                      <small>{!! trans('auth.member') !!}</small>
                                    </p>
                                </li>
                                  <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="{{ route('admin.profile') }}" class="btn btn-default btn-flat">{!! trans('auth.pf') !!}</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="{{ route('logout') }}" class="btn btn-default btn-flat"
                                            onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">{!! trans('auth.logout') !!}
                                        </a>
                                        {!! Form::open(['method' => 'POST', 'route' => 'logout', 'id' => 'logout-form']) !!}
                                        {{ csrf_field() }}
                                        {!! Form::close() !!}
                                    </div>
                                </li>
                            </ul>
                        </li>
                    @endguest
                    </ul>
                </div>
            </nav>
        </header>
    @yield('content')
<footer class="main-footer">
    <strong>Copyright &copy; 2015 - 2015.</strong>
    </div><!-- ./wrapper -->

    {{-- JS --}}
    @include('user.admin.sub.js')
    @yield('js')
</body>
</html>
