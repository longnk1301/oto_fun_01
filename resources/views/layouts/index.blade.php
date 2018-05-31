<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        {!! Html::style('css/style.css') !!}
        {!! Html::style('/bower/boostrap/dist/css/bootstrap.min.css') !!}
        {!! Html::style('/bower/font-awesome/css/font-awesome.min.css') !!}
        {!! Html::script('/bower/jquery/dist/jquery.min.js') !!}
        <title>{!! trans('auth.fc') !!}</title>
    </head>
    <body class="home clearfix">
        <!-- Start header -->
        <header id="header" class="clearfix">
            <!-- START WRAPPER -->
            <div class="wrapper">
                <!-- Logo -->
                <div class="logo">
                   <a href="{{ url('/') }}" rel="home">{!! trans('auth.fc') !!}</a>
                </div>
                <!-- End logo -->

                <!-- Start Menu -->
                <div class="header-right">
                    <div class="float-right">
                        <li>
                            <a href="{!! route('user.change-language', ['en']) !!}">{!! trans('index.en') !!} | </a>
                        </li>
                        <li>
                            <a href="{!! route('user.change-language', ['vi']) !!}">{!! trans('index.vn') !!} | </a>
                        </li>
                        @if (!isset($user))
                            <a href="{{ route('user.login')}}" >{!! trans('auth.login') !!}</a>
                        @else
                            <li class="dropdown user user-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <img src="{{ asset('images/user.jpg') }}" class="img-circle" alt="User Image" />
                                    <span class="hidden-xs">{{ Auth::user()->name }}</span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="user-footer">
                                        <div class="pull-left">
                                            <a href="{{ route('user.profile') }}" class="btn btn-default btn-flat">{!! trans('auth.pf') !!}</a>
                                        </div>
                                        <div class="pull-right">
                                            <a href="{{ route('user.logout') }}" class="btn btn-default btn-flat"
                                                onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">{!! trans('auth.logout') !!}
                                            </a>
                                            {!! Form::open(['method' => 'POST', 'route' => 'user.logout', 'id' => 'logout-form']) !!}
                                            {{ csrf_field() }}
                                            {!! Form::close() !!}
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </div>

                    <div class="menu">
                        <ul>
                            <!-- NEWS -->
                            <li class="bg-sea text-white">
                                 <a href="{{ url('news')}}">{!!trans('index.news') !!}</a>
                            </li>
                            <!-- END NEWS -->

                            <!-- SHOP NEWS -->
                            <li class="bg-orange text-white">
                                <a href="{{ route('newcar')}}" >{!!trans('index.shop_new') !!}</a>
                            </li>
                            <!-- END SHOP NEWS -->

                            <!-- SHOP USED -->
                            <li class="bg-blue text-white">
                                 <a href="{{ route('usedcar')}}" >{!! trans('index.shop_used') !!}</a>
                            </li>
                            <!-- END SHOP USED -->

                            <!-- COMPARE -->
                            <li class="bg-slate text-white">
                                 <a href="{{ route('compare')}}" >{!! trans('index.compare') !!}</a>
                            </li>
                            <!-- END COMPARE -->
                        </ul>
                    </div>
                </div>
                <!-- END MENU -->
            </div>
            <!-- END WRAPPER -->
        </header>
        <!-- /header -->

            @yield('content')

    <!-- Start Footer -->
    <footer id="footer" class="clearfix">
        <div class="wrapper clearfix">
            {{-- FOOTER-TOP --}}
            <div class="footer-top clearfix">
                {{-- ROW --}}
                <div class="row clearfix">
                    <div class="col">
                        <dl>
                            <dt class="title">{!! trans('index.products') !!}</dt>
                            <dd>
                                <a href="{{ route('used.car.for.sale') }}">{!! trans('index.used_cars_for_sale') !!}</a>
                            </dd>
                            <dd>
                                <a href="#">{!! trans('index.leaser_a_car') !!}</a>
                            </dd>
                        </dl>
                    </div>

                    <div class="col">
                        <dl>
                            <dt class="title">{!! trans('index.abouts_us') !!}</dt>
                            <dd>
                                <a href="#">{!! trans('index.who_we_are') !!}</a>
                            </dd>
                            <dd>
                                <a href="#">{!! trans('index.contact_us') !!}</a>
                            </dd>
                        </dl>
                    </div>
                    {{-- SOCIAL --}}
                    <div class="col">
                        <dl>
                            <dd class="social">
                                <a href="#"><i class="fa fa-facebook fa-2x" aria-hidden="true"></i></a>
                            </dd>
                            <dd class="social">
                                <a href="#"><i class="fa fa-youtube fa-2x" aria-hidden="true"></i></a>
                            </dd>
                            <dd class="social">
                                <a href="#" rel="publisher"><i class="fa fa-google-plus fa-2x" aria-hidden="true"></i></a>
                            </dd>
                            <dd class="social">
                                <a href="#"><i class="fa fa-twitter fa-2x" aria-hidden="true"></i></a>
                            </dd>
                            <dd class="social">
                                   <a href="#"><i class="fa fa-instagram fa-2x" aria-hidden="true"></i></a>
                            </dd>
                        </dl>
                    </div>
                    {{-- END SOCIAL --}}
                </div>
                {{-- END ROW --}}
            </div>
            {{-- END FOOTER-TOP --}}
        </div>
    </footer>
    <!-- End footer -->
    <!-- Bootstrap 3.3.2 JS -->
    {!! Html::script('/bower/boostrap/dist/js/bootstrap.min.js') !!}
    <!-- AdminLTE App -->
    {!! Html::script('/bower/boostrap/dist/js/app.min.js') !!}
    {!! Html::script('/bower/bootbox/bootbox.min.js') !!}

    @include('layouts.js')

    @section('script')
        @show
    </body>
</html>
