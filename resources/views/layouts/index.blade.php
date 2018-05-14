<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
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
                        <a href="{!! route('user.change-language', ['en']) !!}">{!! trans('index.en') !!} | </a>
                        <a href="{!! route('user.change-language', ['vi']) !!}">{!! trans('index.vn') !!} | </a>
                        <a href="{{ route('login')}}" >{!! trans('auth.login') !!}</a>
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
    </body>
</html>
