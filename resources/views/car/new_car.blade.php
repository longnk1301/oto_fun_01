@extends('layouts.index')

@section('content')

<div class="container post clearfix">
    <div class="row cf">
        <div class="col-md-5 search">
            <div>
                <ul class="search-filter-list">
                    <li>
                        <ul>
                            <li>
                                @if (isset($companys))
                                    @foreach ($companys as $company)
                                    <ul class="">
                                        <li class="col-sm-4">
                                            <a href="#" class="demo" id ="{{ $company->id }}" data-id="{{ $company->id }}">{{ $company->com_name }}</a>
                                        </li>
                                    </ul>
                                @endforeach
                                @else
                                    {{ null }}
                                @endif
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-md-7 search">
            <div class="image-product">
                <aside>
                    <h1>The Funcar Difference</h1>
                    <ul>
                        <li>
                            <h3>A Better Price</h3>
                            With TrueCar, a Certified Dealer gives you an upfront, discounted price that includes all dealer fees, accessory costs, and incentives. This is your TruePrice—the price you’ll pay at the dealership
                        </li>
                        <li>
                            <h3>Dealers Compete, You Compare</h3>
                            TruePrice is better because over 15,000 dealers uniquely set the price in TrueCar knowing you will see their prices alongside what other people paid. They price to get your business.

                        </li>
                        <li>
                            <h3>A Price Curve for Every Car</h3>
                            Every vehicle on TrueCar has a unique price curve that shows you what your neighbors paid for that same car. Cut through the clutter by instantly comparing the TruePrice to what other people paid.
                        </li>
                    </ul>
                </aside>
            </div>
        </div>
    </div>
</div>
<script>
$(document).ready(function()
{
    $('body').on('click', '.demo', function (e) {
        e.preventDefault();
        var id_company = $(this).attr('data-id');
        $.ajax({
            type: 'GET',
            url: '/getnewcar',
            dataType: 'JSON',
            data: { id_company: id_company },
            success: function(data) {
                var html = '';
                        html += '<p class="breadcrumbs">';
                        html += '<span>{{ trans('index.good_choice') }}</span>';
                        html += '</p>';
                        $.each(data, function(index, value){
                                html +=  '<ul class="search">';
                                    html +=  '<li class="col-md-4">';
                                        html +=  '<a href="/details-car/' + value.id + '">';
                                            html += '<figure>';
                                                html += '<img src="'+ value.img.image +'">';
                                                html += '<figcaption>' + value.car_name + '</figcaption>';
                                            html += '</figure>';
                                        html +=  '</a>';
                                    html +=  '</li>';
                                html +=  '</ul>';

                        });
                $('.image-product').html(html);
            }
        });
    })
});
</script>
@endsection
