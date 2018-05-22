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
            <!-- search form -->
            {!! Form::open(['method' => 'GET', 'url' => '#', 'class' => 'sidebar-form']) !!}
            <div class="input-group">
                {!! Form::text('q', '' , ['class' => 'form-control', 'placeholder' => trans('auth.search')]) !!}
                    <span class="input-group-btn">
                        {!! Form::submit( "<i class='fa fa-search'></i>", ['class' => 'btn btn-flat', 'id' => 'search-btn']) !!}
                    </span>
            </div>
            {!! Form::close() !!}
            <!-- /.search form -->
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu">
                <li class="header">{!! trans('auth.main') !!}</li>
                <li class="nav-item has-treeview menu-open">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon fa fa-dashboard"></i>
                            Dashboard
                    </a>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-edit"></i> <span>Danh muc</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{ route('post.data') }}"><i class="fa fa-circle-o"></i>Danh sach danh muc</a></li>
                        <li><a href="#"><i class="fa fa-circle-o"></i>Them danh muc</a></li>
                    </ul>
                </li>
            </ul>
        </section>
<!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <!-- Main content -->
            <section class="content">

            <!-- Main row -->
                <div class="row">
            <!-- Left col -->
                    <section class="col-lg-12 connectedSortable">
                           <table class="table table-bordered table-hover">
                               <caption>{!! trans('dbp') !!}</caption>
                               <thead>
                                   <tr>
                                       <th>{!! trans('auth.id') !!}</th>
                                       <th>{!! trans('auth.cate_id') !!}</th>
                                       <th>{!! trans('auth.title') !!}</th>
                                       <th>{!! trans('auth.image') !!}</th>
                                       <th>{!! trans('auth.summary') !!}</th>
                                       <th>{!! trans('auth.post') !!}</th>
                                       <th>{!! trans('auth.tags') !!}</th>
                                       <th>{!! trans('auth.created_by') !!}</th>
                                       <th>{!! trans('auth.status') !!}</th>
                                       <th>{!! trans('auth.slug') !!}</th>
                                   </tr>
                               </thead>
                               <tbody>
                                @foreach ($post_data as $post_dt)
                                    <tr>
                                        <td>{{ $post_dt->id }}</td>
                                        <td>{{ $post_dt->cate_id }}</td>
                                        <td>{{ $post_dt->title }}</td>
                                        <td>{{ $post_dt->image }}</td>
                                        <td>{{ $post_dt->summary }}</td>
                                        <td>{{ $post_dt->post_date }}</td>
                                        <td>{{ $post_dt->tags }}</td>
                                        <td>{{ $post_dt->created_by }}</td>
                                        <td>{{ $post_dt->status }}</td>
                                        <td>{{ $post_dt->slug }}</td>
                                    </tr>
                                @endforeach
                               </tbody>
                           </table>
                    </section><!-- /.Left col -->
                </div><!-- /.row (main row) -->
            </section><!-- /.content -->
        </div><!-- /.content-wrapper -->
@endsection
