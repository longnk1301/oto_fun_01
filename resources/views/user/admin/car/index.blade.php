@extends('layouts.app')

@section('content')
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset( Auth::user()->avatar ) }}" class="img-circle" alt="{!! trans('auth.used_image') !!}" />
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

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-cart-plus"></i> <span>{{ trans('auth.orders') }}</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('order.index') }}"><i class="fa fa-circle-o nav-icon"></i>{{ trans('auth.list_orders') }}</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-user-o"></i> <span>{{ trans('auth.users') }}</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('user.index') }}"><i class="fa fa-circle-o nav-icon"></i>{{ trans('auth.list_users') }}</a></li>
                </ul>
            </li>
        </ul>
    </section>
<!-- /.sidebar -->
</aside>

<div class="content-wrapper bg-color">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1 class="color-text">
            {{ trans('auth.data_products') }}
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i>{{ trans('auth.dashboard') }}</a></li>
            <li><a href="{{ route('product.index') }}">{{ trans('auth.products') }}</a></li>
            <li class="active">{{ trans('auth.data_products') }}</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <div class="search-form">
                            {!! Form::open(['method' => 'GET', 'id' => 'filterForm']) !!}
                                <div class="page-size form-group col-xs-2">
                                    {!! Form::select(
                                        'pagesize',
                                        getPageSizeList(),
                                        $pageSize,
                                        ['id' => 'pageSize', 'class' => 'form-control']) !!}
                                </div>
                                <div class="form-group col-sm-3 div-cate-relative">
                                    {!! Form::text('keyword', $keyword , ['class' => 'form-control', 'placeholder' => trans('auth.search')]) !!}
                                    {!! Html::decode(Form::button('<i class="fa fa-search"></i>', ['type' => 'submit', 'class' => 'btn btn-success btn-sm btn-asl-form'])) !!}
                                </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                    <!-- /box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                   <th>{!! trans('index.car_name') !!}</th>
                                   <th>{!! trans('auth.image') !!}</th>
                                   <th>{!! trans('auth.cost') !!}</th>
                                   <th>{!! trans('index.car_type') !!}</th>
                                   <th>{!! trans('auth.company') !!}</th>
                                   <th>{!! trans('index.year') !!}</th>
                                   <th>{!! trans('auth.status') !!}</th>
                                   <th>
                                       <a href="{{ route('product.add') }}" class="btn btn-success Tooltip">
                                           <i class="fa fa-plus"></i>
                                           <span class="tooltipText">{{ trans('auth.add') }}</span>
                                           {{ trans('auth.add') }}
                                       </a>
                                   </th>
                               </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                        <tr>
                                            <td>{{ $product->car_name }}</td>
                                            <td>
                                                @foreach ($product->images as $allImage)
                                                    <img src="{{ asset($allImage->image) }}" class="images-cate-admin">
                                                @endforeach
                                            </td>
                                            <td>{{ $product->car_cost }}</td>
                                            <td>{{ $product->car_type->type }}</td>
                                            <td>{{ $product->companys->com_name }}</td>
                                            <td>{{ $product->car_year }}</td>
                                            <td>{{ $product->status }}</td>
                                            <td>
                                                <a href="{{ route('product.show', ['id' => $product->id]) }}" class="btn btn-sm btn-success Tooltip">
                                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                                    <span class="tooltipText">{{ trans('auth.show') }}</span>
                                                </a>
                                                <a href="{{ route('product.edit', ['id' => $product->id]) }}" class="btn btn-sm btn-primary Tooltip">
                                                    <i class="fa fa-pencil"></i>
                                                    <span class="tooltipText">{{ trans('auth.edit') }}</span>
                                                </a>
                                                <a href="javascript:;" onclick="confirmRemove('{{ route('product.remove', ['id' => $product->id]) }}')" class="btn btn-sm btn-danger Tooltip">
                                                    <i class="fa fa-remove"></i>
                                                    <span class="tooltipText">{{ trans('auth.delete') }}</span>
                                                </a>
                                            </td>
                                        </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                   <th>{!! trans('index.car_name') !!}</th>
                                   <th>{!! trans('auth.image') !!}</th>
                                   <th>{!! trans('auth.cost') !!}</th>
                                   <th>{!! trans('index.car_type') !!}</th>
                                   <th>{!! trans('auth.company') !!}</th>
                                   <th>{!! trans('index.year') !!}</th>
                                   <th>{!! trans('auth.status') !!}</th>
                               </tr>
                            </tfoot>
                        </table>
                        <div class="text-center">
                            {{ $products->links() }}
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
@endsection

@section('js')
    <script>
        function confirmRemove(url) {
            bootbox.confirm({
                message: '{{ trans('auth.are_you_delete?') }}',
                buttons: {
                    confirm: {
                        label: '{{ trans('auth.yes') }}',
                        className: 'btn-success'
                    },
                    cancel: {
                        label: '{{ trans('auth.no') }}',
                        className: 'btn-danger'
                    }
                },
                callback: function (result) {
                    if(result) {
                        window.location.href = url;
                    }
                }
            });
        }
    </script>

    <script>
        $(document).ready(function() {
            $('#pageSize').on('change', function() {
                $('#filterForm').submit();
            });
        });
    </script>

    <script>
        $('#example1').DataTable({
          'paging'      : false,
          'lengthChange': false,
          'searching'   : false,
          'ordering'    : true,
          'info'        : false,
          'autoWidth'   : false
        });
    </script>
@endsection
