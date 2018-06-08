@extends('layouts.app')

@section('content')
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
          {{ trans('auth.data_posts') }}
       </h1>
       <ol class="breadcrumb">
          <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i>{{ trans('auth.dashboard') }}</a></li>
          <li><a href="{{ route('post.index') }}">{{ trans('auth.posts') }}</a></li>
          <li class="active">{{ trans('auth.data_posts') }}</li>
       </ol>
    </section>

    <!-- Main content -->
    <section class="content ">
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
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                       <thead>
                          <tr>
                            <th>{!! trans('auth.category_name') !!}</th>
                            <th>{!! trans('auth.title') !!}</th>
                            <th>{!! trans('auth.image') !!}</th>
                            <th>{!! trans('auth.status') !!}</th>
                            <th>{!! trans('auth.created_at') !!}</th>
                            <th>{!! trans('auth.update_at') !!}</th>
                            <th>
                                <a href="{{ route('post.add') }}" class="btn btn-success Tooltip" data-toggle="modal" data-target="#myModal2">
                                   <i class="fa fa-plus"></i>
                                   <span class="tooltipText">{{ trans('auth.add') }}</span>
                                   {{ trans('auth.add') }}
                                </a>
                                <div class="modal fade" id="myModal2" role="dialog">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                        </div>
                                    </div>
                                </div>
                            </th>
                         </tr>
                       </thead>
                       <tbody>
                           @foreach ($posts as $p)
                             <tr>
                                <td>
                                    @if (count($p->category_name) > 0)
                                        {{ str_limit($p->category_name->category_name, 20, '...') }}
                                    @endif
                                </td>
                                <td>{{ str_limit($p->title, 45, '...') }}</td>
                                <td>
                                    @if (count($p->images) > 0)
                                        <img src="{{ asset($p->images->image) }}" class="images-cate-admin">
                                    @endif
                                </td>
                                <td>{{ $p->status }}</td>
                                <td>{{ $p->created_at }}</td>
                                <td>{{ $p->updated_at }}</td>
                                <td>
                                    <a href="{{ route('post.show', ['id' => $p->id]) }}" class="btn btn-sm btn-primary Tooltip" data-toggle="modal" data-target="#myModal">
                                        <i class="fa fa-eye"></i>
                                        <span class="tooltipText">{{ trans('auth.show') }}</span>
                                    </a>
                                        <div class="modal fade" id="myModal" role="dialog">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                </div>
                                            </div>
                                        </div>

                                    <a href="{{ route('post.edit', ['id' => $p->id]) }}" class="btn btn-sm btn-warning Tooltip" data-toggle="modal" data-target="#myModal2">
                                       <i class="fa fa-pencil"></i>
                                        <span class="tooltipText">{{ trans('auth.edit') }}</span>
                                    </a>

                                    <div class="modal fade" id="myModal2" role="dialog">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                            </div>
                                        </div>
                                    </div>

                                    <a href="javascript:;" onclick="confirmRemove('{{ route('post.remove', ['id' => $p->id]) }}')" class="btn btn-sm btn-danger Tooltip">
                                       <i class="fa fa-remove"></i>
                                       <span class="tooltipText">{{ trans('auth.delete') }}</span>
                                    </a>
                                </td>
                             </tr>
                          @endforeach
                       </tbody>
                       <tfoot>
                          <tr>
                            <th>{!! trans('auth.category_name') !!}</th>
                            <th>{!! trans('auth.title') !!}</th>
                            <th>{!! trans('auth.image') !!}</th>
                            <th>{!! trans('auth.status') !!}</th>
                            <th>{!! trans('auth.created_at') !!}</th>
                            <th>{!! trans('auth.update_at') !!}</th>
                         </tr>
                       </tfoot>
                    </table>
                    <div class="text-center">
                       {{ $posts->links() }}
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
@endsection
