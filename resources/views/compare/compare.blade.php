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
                        <img src="{{ asset($comp->car_image) }}" alt="">
                    </div>
                <div class="col-xs-5">
                    <p><b>{{ trans('index.car_name') }}</b>{{ $comp->car_name }}</p>
                    <p><b>{{ trans('index.car_type') }}</b>{{ $comp->car_type }}</p>
                    <p><b>{{ trans('index.car_year') }}</b>{{ $comp->car_years }}</p>
                    <p><b>{{ trans('index.car_summary') }}</b>{{ str_limit($comp->summary, 120, '...') }}</p>
                </div>
                <div class="col-xs-3 view-details">
                    <p><b>${{ $comp->car_cost }}</b></p>
                    <b><a href="/details-car/{{ $comp->id }}">{{ trans('index.views_details') }}</a></b><br>
                    <div class="compare ">
                        {!! Form::checkbox('compare', 'on', false, ['data-id' => $comp->id, 'class' => 'check']) !!}
                        <span class="link">Compare</span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="col-md-3 col-md-offset-1 ">
            <div class="vehicle-compare">
                <h3>Vehicle Compare</h3>
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
                <h4>Selected Car </h4>
                <p>
                    <span>Selected <strong class="numItems"></strong> cars</span>
                    <i class="fa fa-recycle" aria-hidden="true"></i><a href="javascript:void(0)" class="Delete-all" data-id="{{ $comp->id }}">Delete All</a>
                    <button type="submit" class="btncompare">Compare</button>
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
        console.log(carId);
        var url = "/compare-add/";
            $.ajax({
                type: "POST",
                url: url,
                data: {
                    compare_id: carId
                },
                success: function(data) {
                    // $.ajax({
                    //     url: '/find-car',
                    //     type: 'POST',
                    //     dataType: 'JSON',
                    //     data: {carId: carId},
                    //     success: function(result) {
                    //         var numsItem = 1;
                    //         var  num = $('.item').length;
                    //         numsItem += num;
                    //         $('.numItems').html(numsItem);

                    //         $('.itemselect').html(html);
                    //     }
                    // });
                    // return false;
                }
            });
    });

    $(".btncompare").on('click', function (event) {
        event.preventDefault();
        //alert('note');
        var item = $(".compare-result .itemselect").find(".item").length;
        if (eval(item) < 2) {
            alert("Bạn phải chọn ít nhất 2 xe để so sánh");
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
                console.log(result);
                $('#parent'+ result.id).remove();
            }
        });
    });
});
</script>
@endsection