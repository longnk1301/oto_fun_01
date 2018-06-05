<div class="bg-color">
    <section class="content-header bg-white">
        <div class="image modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            @foreach ($images as $allImage)
                <div class="col-md-6 image-car">
                    <img src="{{ asset($allImage->image) }}" alt="">
                </div>
            @endforeach
        </div>
        <div class="f-right modal-body">
            <a href=" {{ route('product.index') }}" class="btn btn-light Tooltip">
                <i class="fa fa-reply-all" aria-hidden="true"></i>
                <span class="tooltipText">{{ trans('auth.back') }}</span>
            </a>
            <a href="javascript:;" onclick="confirmRemove('{{ route('product.remove', ['id' => $detail_car->id]) }}')" class="btn btn-danger Tooltip">
                <i class="fa fa-remove"></i>
                <span class="tooltipText">{{ trans('auth.delete') }}</span>
            </a>
        </div>
        <div class="mg-top1">
            <h1>{{ trans('auth.car_name') }}: {{ $detail_car->car_name }} {{ $colors->color }}</h1>
            <h4 class="text-warning">${{ number_format($detail_car->car_cost, 0, ", ", ".") }}</h4>
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
