<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
         {!! Html::style('css/style.css') !!}
        <title>FunCars</title>
        </style>
    </head>
    <body class="home cf">
        <!-- Start header -->
        <header id="header" class="cf">
            <!-- START WRAPPER -->
            <div class="wrapper">
                <!-- Logo -->
                <div class="logo">
                   <a href="" rel="home">FunCars</a>
                </div>
                <!-- End logo -->

                <!-- Start Menu -->
                <div class="header-right">
                    <div class="float-right">
                        <a href="{!! route('user.change-language', ['en']) !!}">{!!trans('index.en')!!} | </a>
                        <a href="{!! route('user.change-language', ['vi']) !!}">{!!trans('index.vn')!!} | </a>
                        <a href="{{route('login')}}" >{!! trans('auth.login') !!}</a>
                    </div>
                    <div class="menu">
                        <ul>
                            <!-- NEWS -->
                            <li class="bg-red">
                                 <a href="{{url('news')}}">{!!trans('index.news')!!}</a>
                            </li>
                            <!-- END NEWS -->

                            <!-- SHOP NEWS -->
                            <li class="bg-orange">
                                <a href="{{url('car')}}" >{!!trans('index.shop_new')!!}</a>
                            </li>
                            <!-- END SHOP NEWS -->

                            <!-- SHOP USED -->
                            <li class="bg-blue">
                                 <a href="#" >{!!trans('index.shop_used')!!}</a>
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

        <!-- Start main -->
        <main id="main-content" class="cf">
            <!-- START ENTRY-CONTENT -->
            <section class="entry-content cf">
                <!-- BOX 1 -->
                <section class="box1 cf">
                    <!-- START VIDEO -->
                    <div class="video cf">
                        <video loop muted autoplay class="video-movie">
                            <source src="{{ asset('video/bg.mp4') }}" type="video/mp4">
                        </video>
                    </div>
                    <!-- END VIDEO -->

                    <!-- WRAPPER -->
                    <div class="wrapper cf">
                        <div class="block">
                            <p class="content">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                            </p>
                        </div>
                    </div>
                    <!-- END WRAPPER -->
                </section>
                <!-- END BOX 1 -->

                <!-- BOX 2 -->
                <section class="box2 cf">
                    <!-- CONTAINER -->
                    <div class="container cf">
                        <div style="text-align: center;">
                            <p class="price-choose">Price a new car. Choose a brand</p>
                        </div>
                        {{-- START IN-BOX2 --}}
                        <div class="in-box2 cf">
                            {{-- CHOOSE --}}
                            <div class="choose cf">

                                <ul>
                                    <li>
                                        <a href="#" >
                                            <img src="{{ asset('images/acura_96x96.png')}}" alt="acura" width="24px" height="24px"/>
                                            Acura
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" >
                                            <img src="{{ asset('images/alfa-romeo_96x96.png')}}" alt="alfa" width="24px" height="24px"/>
                                            Alfa Romeo
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" >
                                            <img src="{{ asset('images/audi_96x96.png')}}" alt="audi" width="24px" height="24px"/>
                                            Audi
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" >
                                             <img src="{{ asset('images/bmw_96x96.png')}}" alt="bmw" width="24px" height="24px"/>
                                            BMW
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" >
                                             <img src="{{ asset('images/buick_96x96.png')}}" alt="buick" width="24px" height="24px"/>
                                            Buick
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" >
                                             <img src="{{ asset('images/cadillac_96x96.png')}}" alt="cadillac" width="24px" height="24px"/>
                                            Cadillac
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" >
                                             <img src="{{ asset('images/chevrolet_96x96.png')}}" alt="chevrolet" width="24px" height="24px"/>
                                            Chevrolet
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" >
                                             <img src="{{ asset('images/chrysler_96x96.png')}}" alt="chrysler" width="24px" height="24px"/>
                                            Chrysler
                                        </a>
                                    </li>
                                </ul>

                                <ul>
                                    <li>
                                        <a href="#" >
                                            <img src="{{ asset('images/dodge_96x96.png')}}" alt="dodge" width="24px" height="24px"/>
                                            Dodge
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" >
                                            <img src="{{ asset('images/fiat_96x96.png')}}" alt="fiat" width="24px" height="24px"/>
                                            Fiat
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" >
                                            <img src="{{ asset('images/ford_96x96.png')}}" alt="ford" width="24px" height="24px"/>
                                            Ford
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" >
                                             <img src="{{ asset('images/genesis_96x96.png')}}" alt="genesis" width="24px" height="24px"/>
                                            Genesis
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" >
                                             <img src="{{ asset('images/gmc_96x96.png')}}" alt="gmc" width="24px" height="24px"/>
                                            GMC
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" >
                                             <img src="{{ asset('images/honda_96x96.png')}}" alt="honda" width="24px" height="24px"/>
                                            Honda
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" >
                                             <img src="{{ asset('images/hyundai_96x96.png')}}" alt="hyundai" width="24px" height="24px"/>
                                            Hyundai
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" >
                                             <img src="{{ asset('images/infiniti_96x96.png')}}" alt="infiniti" width="24px" height="24px"/>
                                            Infiniti
                                        </a>
                                    </li>
                                </ul>

                                <ul>
                                    <li>
                                        <a href="#" >
                                            <img src="{{ asset('images/jaguar_96x96.png')}}" alt="jaguar" width="24px" height="24px"/>
                                            Jaguar
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" >
                                            <img src="{{ asset('images/jeep_96x96.png')}}" alt="jeep" width="24px" height="24px"/>
                                            Jeep
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" >
                                            <img src="{{ asset('images/kia_96x96.png')}}" alt="kia" width="24px" height="24px"/>
                                            KIA
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" >
                                             <img src="{{ asset('images/land-rover_96x96.png')}}" alt="lanrover" width="24px" height="24px"/>
                                            Lan Rover
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" >
                                             <img src="{{ asset('images/lexus_96x96.png')}}" alt="lexus" width="24px" height="24px"/>
                                            Lexus
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" >
                                             <img src="{{ asset('images/lincoln_96x96.png')}}" alt="lincoln" width="24px" height="24px"/>
                                            Lincoln
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" >
                                             <img src="{{ asset('images/maserati_96x96.png')}}" alt="maserati" width="24px" height="24px"/>
                                            Maserati
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" >
                                             <img src="{{ asset('images/mazda_96x96.png')}}" alt="mazda" width="24px" height="24px"/>
                                            Mazda
                                        </a>
                                    </li>
                                </ul>

                                <ul>
                                    <li>
                                        <a href="#" >
                                            <img src="{{ asset('images/mercedes-benz_96x96.png')}}" alt="mercedes" width="24px" height="24px"/>
                                            Mercedes
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" >
                                            <img src="{{ asset('images/mini_96x96.png')}}" alt="mini" width="24px" height="24px"/>
                                            Mini
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" >
                                            <img src="{{ asset('images/mitsubishi_96x96.png')}}" alt="mitsubishi" width="24px" height="24px"/>
                                            Mitsubishi
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" >
                                             <img src="{{ asset('images/nissan_96x96.png')}}" alt="nissan" width="24px" height="24px"/>
                                            Nissan
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" >
                                             <img src="{{ asset('images/porsche_96x96.png')}}" alt="porsche" width="24px" height="24px"/>
                                            Porsche
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" >
                                             <img src="{{ asset('images/ram_96x96.png')}}" alt="ram" width="24px" height="24px"/>
                                            Ram
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" >
                                             <img src="{{ asset('images/scion_96x96.png')}}" alt="scion" width="24px" height="24px"/>
                                            Scion
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" >
                                             <img src="{{ asset('images/subaru_96x96.png')}}" alt="subaru" width="24px" height="24px"/>
                                            Subaru
                                        </a>
                                    </li>
                                </ul>

                            </div>
                            {{-- END CHOOSE --}}
                        </div>
                        {{-- END IN-BOX2 --}}
                    </div>
                    <!-- END CONTAINER -->
                </section>
                <!-- END BOX 2 -->

                <!-- BOX 3.1 -->
                <section class="box3 bg-gray cf">
                    {{-- CONTAINER --}}
                    <div class="container">
                        <span class="in-box3">
                            <span class="text">
                                <h2>Right Car, Better Price</h2>
                                <p>It’s a question on every car shopper’s mind: “How do I know that the price I see on this car is a good price?” There hasn't been a great answer to this question, until now.</p>
                                <p>With TrueCar, a Certified Dealer gives you an upfront, discounted price that includes all fees, accessory costs and incentives. This is your TruePrice, the price you’ll pay at the dealership. Better than the price you will find on other websites, backed by data, and transparent down to the last detail.</p>
                            </span>
                            <span class="img-container">
                                <img src="{{asset('images/module-1.png')}}" alt="module-1" width="481">
                            </span>
                        </span>
                    </div>
                    {{-- END CONTAINER --}}
                </section>
                <!-- END BOX 3.1 -->

                <!-- BOX 3.2 -->
                <section class="box3 bg-white cf">
                    {{-- CONTAINER --}}
                    <div class="container cf">
                        <span class="in-box3 cf">
                            <span class="img-container2">
                                <img src="{{asset('images/module-2.png')}}" alt="module-2" width="481">
                            </span>
                            <span class="text">
                                <h2>Dealers Compete, You Compare</h2>
                                <p>TruePrice is better because over 15,000 dealers uniquely set the price in TrueCar knowing you will see their prices alongside what other people paid.</p>
                                <p>Our dealers know all about the TrueCar Price Curve — they can see it when they set their pricing. Because of the curve, they price their vehicles competitively, so they won't lose your business.</p>
                            </span>
                        </span>
                    </div>
                    {{-- END CONTAINER --}}
                </section>
                <!-- END BOX 3.2 -->

                <!-- BOX 3.3 -->
                <section class="box3 bg-gray cf">
                    {{-- CONTAINER --}}
                    <div class="container cf">
                        <span class="in-box3 cf">
                            <span class="text">
                                <h2>A Price Curve For Every Car</h2>
                                <p>Every vehicle on TrueCar has a unique price curve data visualization that shows you what your neighbors paid for that same car: make, model, color and style.</p>
                                <p>This curve comes from our detailed analysis of millions of sales transactions from across the United States. Finally, you can cut through the numerical clutter of car buying and view a single validated price on the exact car or truck you want.</p>
                            </span>
                            <span class="img-container">
                                <img src="{{asset('images/module-3.png')}}" alt="module-1" width="481">
                            </span>
                        </span>
                    </div>
                    {{-- END CONTAINER --}}
                </section>
                <!-- END BOX 3.3 -->


                <!-- START PARTNERS -->
                <section class="partners bg-white cf">
                    {{-- ROW --}}
                    <div class="row ">
                        <span class="text cf" >
                            <h2 style="text-align: center; font-size: 45px;">Trusted to Deliver the TruePrice</h2>
                            <p>Since the very beginning, TrueCar has partnered with some of the largest membership organizations in the country, including USAA, Sam's Club, and American Express, giving members who use TrueCar a superior car-buying experience.</p>
                        </span>
                        {{-- PARTNER --}}
                        <ul class="partner cf">
                                    <li class="item">
                                        <img src="{{asset('images/pn1.png')}}" width="86" height="88" alt="usaa"/>
                                    </li>
                                     <li class="item">
                                        <img src="{{asset('images/pn2.png')}}" width="86" height="88" alt="samisclub"/>
                                    </li>
                                     <li class="item">
                                        <img src="{{asset('images/pn3.png')}}" width="86" height="88" alt="allstate"/>
                                    </li>
                                     <li class="item">
                                        <img src="{{asset('images/pn4.png')}}" width="86" height="88" alt="farmers"/>
                                    </li>
                                     <li class="item">
                                        <img src="{{asset('images/pn5.png')}}" width="86" height="88" alt="usnews"/>
                                    </li>
                                     <li class="item">
                                        <img src="{{asset('images/pn6.png')}}" width="86" height="88" alt="penfed"/>
                                    </li>
                                     <li class="item">
                                        <img src="{{asset('images/pn7.png')}}" width="86" height="88" alt="american"/>
                                    </li>
                                     <li class="item">
                                        <img src="{{asset('images/pn8.png')}}" width="86" height="88" alt="geico"/>
                                    </li>
                        </ul>
                        {{-- END PARTNER --}}
                        <p class="used-link">TrueCar Certified Dealers also offer used cars.
                            <a href="#"> View used cars for sale</a>
                        </p>
                    </div>
                    {{-- END ROW --}}
                </section>
                <!-- END PARTNERS -->
            </section>
            <!-- END ENTRY-CONTENT -->
        </main>
        <!-- End main -->

        <!-- Start Footer -->
         <footer id="footer" class="cf">
            <div class="wrapper cf">
                {{-- FOOTER-TOP --}}
                <div class="footer-top cf">
                    {{-- ROW --}}
                    <div class="row cf ">
                        <div class="col">
                            <dl>
                                <dt class="title">{!! trans('index.products') !!}</dt>
                                <dd>
                                    <a href="#">{!! trans('index.used_cars_for_sale') !!}</a>
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
                                        <a href="#"><img src="//a.tcimg.net/tcdc/241.1-820/images/site/svg/logo-facebook-white.svg" alt="Facebook" width="25" height="25" /></a>
                                    </dd>
                                    <dd class="social">
                                        <a href="#"><img src="//a.tcimg.net/tcdc/241.1-820/images/site/svg/logo-youtube-white.svg" alt="YouTube" width="25" height="25" /></a>
                                    </dd>
                                     <dd class="social">
                                        <a href="#" rel="publisher"><img src="//a.tcimg.net/tcdc/241.1-820/images/site/svg/logo-googleplus-white.svg" alt="Google Plus" width="25" height="25" /></a>
                                     <dd class="social">
                                        <a href="#"><img src="//a.tcimg.net/tcdc/241.1-820/images/site/svg/logo-twitter-white.svg" alt="Twitter" width="25" height="25" /></a></li>                                </dd>
                                     <dd class="social">
                                       <a href="#"><img src="//a.tcimg.net/tcdc/241.1-820/images/site/svg/logo-instagram-white.svg" alt="Instagram" width="25" height="25" /></a>
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
    </body>
</html>
