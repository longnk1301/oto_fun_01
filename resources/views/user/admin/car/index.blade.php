@extends('layouts.app')

@section('content')
    <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <!-- Sidebar user panel -->
                <div class="user-panel">
                    <div class="pull-left image">
                        <img src="{{ asset('images/user.jpg') }}" class="img-circle" alt="User Image" />
                    </div>
                    <div class="pull-left info">
                        <p>{{ Auth::user()->name }}</p>
                        <a href="#"><i class="fa fa-circle text-success"></i>{!! trans('auth.ol') !!}</a>
                    </div>
                </div>
                <!-- search form -->
                {!! Form::open(['method' => 'GET', 'url' => '#', 'class' => 'sidebar-form']) !!}
                <div class="input-group">
                    {!! Form::text('q', '' , ['class' => 'form-control', 'placeholder' => trans('auth.search')]) !!}
                        <span class="input-group-btn">
                            {!! Form::submit( '', ['class' => 'btn btn-flat', 'id' => 'search-btn']) !!}
                        </span>
                </div>
                {!! Form::close() !!}
                <!-- /.search form -->
                <!-- sidebar menu: : style can be found in sidebar.less -->
                <ul class="sidebar-menu">
                    <li class="header">{!! trans('auth.main') !!}</li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-edit"></i> <span>{!! trans('auth.form') !!}</span>
                            <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ route('post-data') }}"><i class="fa fa-circle-o"></i>{!! trans('auth.post') !!}</a></li>
                            <li><a href="{{ route('car-data') }}"><i class="fa fa-circle-o"></i>{!! trans('auth.car') !!}</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-table"></i> <span>{!! trans('auth.table') !!}</span>
                            <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="pages/tables/simple.html"><i class="fa fa-circle-o"></i>1</a></li>
                            <li>
                                <a href="pages/tables/data.html"><i class="fa fa-circle-o"></i>2</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="pages/mailbox/mailbox.html">
                            <i class="fa fa-envelope"></i> <span>{!! trans('auth.mail') !!}</span>
                            <small class="label pull-right bg-yellow">0</small>
                        </a>
                    </li>
                </ul>
            </section>
    <!-- /.sidebar -->
        </aside>

    <!-- Content Wrapper. Contains page content -->
        <div class="    content-wrapper">
        <!-- Content Header (Page header) -->
        <!-- Main content -->
            <section class="content">

            <!-- Main row -->
                <div class="row">
            <!-- Left col -->
                    <section class="col-lg-12 connectedSortable">
                           <table class="table table-bordered table-hover">
                               <caption>Data Products</caption>
                               <thead>
                                   <tr>
                                       <th>Car Name</th>
                                       <th>Car Image</th>
                                       <th>Car Cost</th>
                                       <th>Car Type</th>
                                       <th>Car Company</th>
                                       <th>Car Number</th>
                                       <th>Car Color</th>
                                       <th>Year</th>
                                   </tr>
                               </thead>
                               <tbody>
                                @foreach ($car_data as $car_dt)
                                    <tr>
                                        <td>{{ $car_dt->car_name }}</td>
                                        <td>{{ $car_dt->car_image }}</td>
                                        <td>{{ $car_dt->car_cost }}</td>
                                        <td>{{ $car_dt->car_type }}</td>
                                        <td>{{ $car_dt->car_company }}</td>
                                        <td>{{ $car_dt->car_number }}</td>
                                        <td>{{ $car_dt->car_color }}</td>
                                        <td>{{ $car_dt->car_years }}</td>
                                        <td>
                                            {!! Form::open(['method' => 'GET', 'url' => '#']) !!}
                                            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                            {!! Form::submit('Edit', ['class' => 'btn btn-warning']) !!}
                                            {!! Form::close() !!}
                                        </td>
                                   </tr>
                                @endforeach
                               </tbody>
                           </table>
                    </section><!-- /.Left col -->
                </div><!-- /.row (main row) -->
            </section><!-- /.content -->
        </div><!-- /.content-wrapper -->
@endsection
