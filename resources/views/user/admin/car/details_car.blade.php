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
    <section class="content-header bg-white">
        <div class="image">
            @foreach ($images as $allImage)
                <div class="col-md-6 image-car">
                    <img src="{{ asset($allImage->image) }}" alt="">
                </div>
            @endforeach
        </div>
        <div class="f-right">
            <a href=" {{ route('product.index') }}" class="btn btn-primary Tooltip">
                <i class="fa fa-reply-all" aria-hidden="true"></i>
                <span class="tooltipText">{{ trans('auth.back') }}</span>
            </a>
            <a href="{{ route('product.edit', ['id' => $detail_car->id]) }}" class="btn btn-primary Tooltip">
                <i class="fa fa-pencil"></i>
                <span class="tooltipText">{{ trans('auth.edit') }}</span>
            </a>
            <a href="javascript:;" onclick="confirmRemove('{{ route('product.remove', ['id' => $detail_car->id]) }}')" class="btn btn-danger Tooltip">
                <i class="fa fa-remove"></i>
                <span class="tooltipText">{{ trans('auth.delete') }}</span>
            </a>
        </div>
        <div class="mg-top1">
            <h1>{{ trans('auth.car_name') }}: {{ $detail_car->car_name }} {{ $colors->color }}</h1>
            <h4>${{ number_format($detail_car->car_cost, 0, ", ", ".") }}</h4>
        </div>

        <div>
            <h1>{{ trans('auth.vehicles') }}</h1>
            <div class="engine">
                <h2>{{ trans('auth.engines') }}</h2>
                <div class="dp-block">
                    <table class="table table-striped table-hover">
                        <tbody>
                            <tr>
                                <td class="wd">{{ trans('auth.engine_type') }}</td>
                                <td>{{ $engines->engine_type }}</td>
                            </tr>
                            <tr>
                                <td class="wd">{{ trans('auth.cylinder_capacity') }}</td>
                                <td>{{ $engines->cylinder_capacity }}</td>
                            </tr>
                            <tr>
                                <td class="wd">{{ trans('auth.max_capacity') }}</td>
                                <td>{{ $engines->max_capacity }}</td>
                            </tr>
                            <tr>
                                <td class="wd">{{ trans('auth.drive_type') }}</td>
                                <td>{{ $engines->drive_type }}</td>
                            </tr>
                            <tr>
                                <td class="wd">{{ trans('auth.drive_style') }}</td>
                                <td>{{ $engines->drive_style }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="engine">
                <h2>{{ trans('auth.operates') }}</h2>
                <div class="dp-block">
                    <table class="table table-striped table-hover">
                        <tbody>
                            <tr>
                                <td class="wd">{{ trans('auth.tissue_men') }}</td>
                                <td>{{ $operates->tissue_man }}</td>
                            </tr>
                            <tr>
                                <td class="wd">{{ trans('auth.gear') }}</td>
                                <td>{{ $operates->gear }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="engine">
                <h2>{{ trans('auth.exteriors') }}</h2>
                <div class="dp-block">
                    <table class="table table-striped table-hover">
                        <tbody>
                            <tr>
                                <td class="wd">{{ trans('auth.locksner') }}</td>
                                <td>{{ $exteriors->locks_nearby }}</td>
                            </tr>
                            <tr>
                                <td class="wd">{{ trans('auth.locksremote') }}</td>
                                <td>{{ $exteriors->locks_remote }}</td>
                            </tr>
                            <tr>
                                <td class="wd">{{ trans('auth.turn_light') }}</td>
                                <td>{{ $exteriors->turn_singal_light }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="engine">
                <h2>{{ trans('auth.sizes') }}</h2>
                <div class="dp-block">
                    <table class="table table-striped table-hover">
                        <tbody>
                            <tr>
                                <td class="wd">{{ trans('auth.height') }}</td>
                                <td>{{ $sizes->height }}</td>
                            </tr>
                            <tr>
                                <td class="wd">{{ trans('auth.weight') }}</td>
                                <td>{{ $sizes->weight }}</td>
                            </tr>
                            <tr>
                                <td class="wd">{{ trans('auth.width') }}</td>
                                <td>{{ $sizes->width }}</td>
                            </tr>
                            <tr>
                                <td class="wd">{{ trans('auth.colc') }}</td>
                                <td>{{ $sizes->colc }}</td>
                            </tr>
                            <tr>
                                <td class="wd">{{ trans('auth.volume_fuel') }}</td>
                                <td>{{ $sizes->volume_fuel }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
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
@endsection
