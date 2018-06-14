@extends('layouts.app')

@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}">

<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
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
                <a href="{{ route('cate.index') }}">
                    <i class="fa fa-edit"></i> <span>{{ trans('auth.categories') }}</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
            </li>

            <li class="treeview">
                <a href="{{ route('post.index') }}">
                    <i class="fa fa-file-text-o"></i> <span>{{ trans('auth.posts') }}</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
            </li>

            <li class="treeview">
                <a href="{{ route('product.index') }}">
                    <i class="fa fa-car"></i> <span>{{ trans('auth.products') }}</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
            </li>

            <li class="treeview">
                <a href="{{ route('company.index') }}">
                    <i class="fa fa-snapchat"></i> <span>{{ trans('auth.company') }}</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
            </li>

            <li class="treeview">
                <a href="{{ route('car_type.index') }}">
                    <i class="fa fa-themeisle"></i> <span>{{ trans('auth.car_type') }}</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
            </li>

            <li class="treeview">
                <a href="{{ route('color.index') }}">
                    <i class="fa fa-paint-brush"></i> <span>{{ trans('index.car_color') }}</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
            </li>

            <li class="treeview">
                <a href="{{ route('order.index') }}">
                    <i class="fa fa-cart-plus"></i> <span>{{ trans('auth.orders') }}</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
            </li>

            <li class="treeview">
                <a href="{{ route('user.index') }}">
                    <i class="fa fa-user-o"></i> <span>{{ trans('auth.users') }}</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
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
                    @if (session('msg'))
                        <div class="alert alert-danger">
                            <span>{{ session('msg') }}</span>
                        </div>
                    @endif
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <button class="btn btn-danger delete_all" data-url="{{ route('product.remove.all') }}">Delete All</button>
                                <tr>
                                   <th>{!! trans('index.car_name') !!}</th>
                                   <th>{!! trans('auth.image') !!}</th>
                                   <th>{!! trans('auth.cost') !!}</th>
                                   <th>{!! trans('index.car_type') !!}</th>
                                   <th>{!! trans('auth.company') !!}</th>
                                   <th>{!! trans('index.year') !!}</th>
                                   <th>{!! trans('auth.status') !!}</th>
                                   <th><input type="checkbox" id="master"></th>
                                   <th>
                                       <a href="{{ route('product.add') }}" class="btn btn-success Tooltip" data-toggle="modal" data-target="#myModal1">
                                           <i class="fa fa-plus"></i>
                                           <span class="tooltipText">{{ trans('auth.add') }}</span>
                                           {{ trans('auth.add') }}
                                       </a>
                                        <div class="modal fade" id="myModal1" role="dialog">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                </div>
                                            </div>
                                        </div>
                                   </th>
                               </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                        <tr>
                                            <td>{{ $product->car_name }}</td>
                                            <td>
                                                @if (count($product->images) > 0)
                                                    <img src="{{ asset($product->images->image) }}" class="images-cate-admin">
                                                @endif
                                            </td>
                                            <td>{{ $product->car_cost }}</td>
                                            <td>
                                                @if (!isset($product->car_type->type))
                                                    {{ null }}
                                                @else
                                                    {{ $product->car_type->type }}
                                                @endif
                                            </td>
                                            <td>
                                                @if (!isset($product->companys->com_name))
                                                    {{ null }}
                                                @else
                                                    {{ $product->companys->com_name }}
                                                @endif
                                            </td>
                                            <td>{{ $product->car_year }}</td>
                                            <td>{{ $product->status }}</td>
                                            <td>
                                                <input type="checkbox" class="sub_chk" data-id="{{ $product->id }}">
                                            </td>
                                            <td>
                                                <a href="{{ route('product.show', ['id' => $product->id]) }}" class="btn btn-sm btn-primary Tooltip" data-toggle="modal" data-target="#myModal">
                                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                                    <span class="tooltipText">{{ trans('auth.show') }}</span>
                                                </a>
                                                    <div class="modal fade" id="myModal" role="dialog">
                                                        <div class="modal-dialog modal-lg">
                                                            <div class="modal-content">
                                                            </div>
                                                        </div>
                                                    </div>

                                                <a href="{{ route('product.edit', ['id' => $product->id]) }}" class="btn btn-sm btn-warning Tooltip" data-toggle="modal" data-target="#myModal1">
                                                    <i class="fa fa-pencil"></i>
                                                    <span class="tooltipText">{{ trans('auth.edit') }}</span>
                                                </a>
                                                    <div class="modal fade" id="myModal1" role="dialog">
                                                        <div class="modal-dialog modal-lg">
                                                            <div class="modal-content">
                                                            </div>
                                                        </div>
                                                    </div>

                                                <a href="{{ route('product.duplicate', ['id' => $product->id]) }}" class="btn btn-sm btn-success Tooltip" data-toggle="modal" data-target="#myModal1">
                                                    <i class="fa fa-files-o"></i>
                                                    <span class="tooltipText">{{ trans('auth.duplicate') }}</span>
                                                </a>
                                                    <div class="modal fade" id="myModal1" role="dialog">
                                                        <div class="modal-dialog modal-lg">
                                                            <div class="modal-content">
                                                            </div>
                                                        </div>
                                                    </div>

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
        $(document.body).on('hidden.bs.modal', function () {
            $('#myModal').removeData('bs.modal')
        });

        //Edit SL: more universal
        $(document).on('hidden.bs.modal', function (e) {
            $(e.target).removeData('bs.modal');
        });
    </script>

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

    <script>
        $(document).ready(function () {
            $('#master').on('click', function(e) {
                if ($(this).is(':checked',true)) {
                    $(".sub_chk").prop('checked', true);
                } else {
                    $(".sub_chk").prop('checked',false);
                }
            });

            $('.delete_all').on('click', function(e) {
                var allVals = [];
                $(".sub_chk:checked").each(function() {
                    allVals.push($(this).attr('data-id'));
                });
                if(allVals.length <=0) {
                    alert("Please select row.");
                }  else {
                    var check = confirm("Are you sure you want to delete this row?");
                    if(check == true) {
                        var join_selected_values = allVals.join(",");
                        // console.log($(this).data('url'));
                        $.ajax({
                            url: $(this).data('url'),
                            type: 'DELETE',
                            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                            data: 'ids='+join_selected_values,
                            success: function (data) {
                                if (data['success']) {
                                    $(".sub_chk:checked").each(function() {
                                        $(this).parents("tr").remove();
                                    });
                                    alert(data['success']);
                                } else if (data['error']) {
                                    alert(data['error']);
                                } else {
                                    alert('Whoops Something went wrong!!');
                                }
                            },
                            error: function (data) {
                                alert(data.responseText);
                            }
                        });
                      $.each(allVals, function( index, value ) {
                          $('table tr').filter("[data-row-id='" + value + "']").remove();
                      });
                    }
                }
            });

            $('[data-toggle=confirmation]').confirmation({
                rootSelector: '[data-toggle=confirmation]',
                onConfirm: function (event, element) {
                    element.trigger('confirm');
                }
            });

            $(document).on('confirm', function (e) {
                var ele = e.target;
                e.preventDefault();

                $.ajax({
                    url: ele.href,
                    type: 'DELETE',
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    success: function (data) {
                        if (data['success']) {
                            $("#" + data['tr']).slideUp("slow");
                            alert(data['success']);
                        } else if (data['error']) {
                            alert(data['error']);
                        } else {
                            alert('Whoops Something went wrong!!');
                        }
                    },
                    error: function (data) {
                        alert(data.responseText);
                    }
                });

                return false;
            });
        });
</script>
@endsection
