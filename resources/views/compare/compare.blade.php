@extends('layouts.index')

@section('content')
    <div class="container post">
        <div class="row clearfix">
            <div class="search-box-wrapper">
                {!! Form::open(['method' => 'get', 'url' => route('client.search.product')]) !!}
                    <div class="row">
                        <div class="col-md-8">
                            <div class="suggest">
                                {!! Form::text('keyword', '', ['class' => 'form-control', 'placeholder' => trans('index.search_by')]) !!}
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div>
                                {!! Form::submit( trans('index.go'), ['class'=> 'btn btn-info']) !!}
                            </div>
                        </div>
                    </div>
            </div>
        </div>
        <div class="col-md-8">
            @foreach ($compare as $comp)
            <div class="row products">
                <div class="col-xs-4">
                        <img src="{{ asset($comp->img->image) }}" alt="">
                    </div>
                <div class="col-xs-5">
                    <p><b>{{ trans('index.car_name') }}</b>{{ $comp->car_name }}</p>
                    {{-- <p><b>{{ trans('index.car_type') }}</b>{{ $comp->car_type }}</p> --}}
                    <p><b>{{ trans('index.car_year') }}</b>{{ $comp->car_year }}</p>
                    <p><b>{{ trans('index.car_summary') }}</b>{!! str_limit($comp->summary, 120, '...') !!}</p>
                </div>
                <div class="col-xs-3 view-details">
                    <p><b>${{ number_format($comp->car_cost, 0, ", ", ".") }}</b></p>
                    <b><a href="/details-car/{{ $comp->id }}">{{ trans('index.views_details') }}</a></b><br>
                    <div class="compare ">
                        {!! Form::checkbox('compare', '1', false, ['data-id' => $comp->id, 'class' => 'check']) !!}
                        <span class="link">{{ trans('index.compare') }}</span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="col-md-3 col-md-offset-1">
            <div class="vehicle-compare">
                <h3>{{ trans('auth.va') }}</h3>
                <input type="" name="txtsearch" class="form-control" id="txtsearch" placeholder="Search Car Type" autocomplete="off">
                <div class="scroll">
                    <ul>
                        @foreach ($compare as $c)
                        <li>
                            <a href="javascript:void(0)" data-id = "{{ $c->id }}" class="check">{{ $c->car_name }}</a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="compare-result">
                <h4>{{ trans('auth.selected_car') }}</h4>
                <p>
                    <span>{{ trans('auth.selected') }} <strong class="numItems"></strong> {{ trans('auth.cars') }}</span>
                    <i class="fa fa-trash fa-2x" aria-hidden="true"></i>
                    <a href="javascript:void(0)" data-id="{{ $comp->id }}" class="Delete-all" >{{ trans('auth.delete_all') }}</a>
                    <button type="submit" class="btncompare">{{ trans('index.compare') }}</button>
                </p>
                <div class="itemselect">

                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection

@section('script')

<script>
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(document).ready(function()
{
    $('body').on('click', '.check', function(event) {
        event.preventDefault();
        var carId = $(this).attr('data-id');
        var url = "/compare-add/";
            $.ajax({
                type: "POST",
                url: url,
                data: {
                    compare_id: carId
                },
                success: function(data) {
                    $.ajax({
                        url: '/find-car',
                        type: 'POST',
                        dataType: 'JSON',
                        data: {carId: carId},
                        success: function(result) {
                            var html = '';
                                html += '<div class="item" id="parent' + result['id'] + '" data-id="' + result['id'] + '">';
                                    html += '<div class="delete-car">';
                                        html += '<a href="#" class="DeleteItem" data-id="' + result['id'] + '">';
                                            html += '<i class="fa fa-trash" aria-hidden="true"></i>';
                                        html += '</a>';
                                    html += '</div>';
                                    html += '<div class="avatar-car">';
                                        html += '<img src="' + result['img']['image'] +'" alt="">';
                                    html += '</div>';
                                    html += '<div class="info-car">';
                                        html += '<h2 class="name"><a href="#">' + result['car_name'] + '</a></h2>';
                                    html += '</div>';
                                html += '</div>';
                                    var  num = $('.item').length+1;
                                    $('.numItems').html(num);
                            $('.itemselect').append(html);
                        }
                    });
                    return false;
                }
            });
    });

    $(".btncompare").on('click', function (event) {
        event.preventDefault();
        var item = $(".compare-result .itemselect").find(".item").length;
        if (eval(item) > 5 || eval(item) < 2) {
            alert("Bạn phải chọn ít nhất 2 xe hoặc tối đa 5 xe để so sánh");
        } else {
            location.href = "/compare-list";
        }
    });

    $('body').on('click', '.Delete-all', function (event) {
        event.preventDefault();
        var id = $(this).attr('data-id');
        $.ajax({
            type: "GET",
            url: '/compare-del',
            success: function(result) {
                alert('Xóa thành công!!!');
                $('.item').remove();
            }
        });
    });

    $('body').on('click', '.DeleteItem', function (event) {
        event.preventDefault();
        var id = $(this).attr('data-id');
        $.ajax({
            type: "GET",
            url: '/compare-del-item',
            data: {
                id:id
            },
            success: function(result) {
                $('#parent'+ result.id).remove();
            }
        });
    });
});
</script>

@endsection
