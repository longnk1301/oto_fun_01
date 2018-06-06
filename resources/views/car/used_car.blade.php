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
                                 @foreach ($companys as $company)
                                <ul class="">
                                    <li class="col-sm-4">
                                        <a href="#" class="demo" id ="{{ $company->id }}" data-id="{{ $company->id }}">{{ $company->com_name }}</a>
                                    </li>
                                </ul>
                                @endforeach
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
                            <h3>Extensive Used Car Inventory</h3>
                            Over 750,000 Pre-Owned vehicles for sale from Certified Dealers nationwi
                        </li>
                        <li>
                            <h3>Buy With Confidence</h3>
                            Get an exceptional car buying experience when you purchase from a TrueCar Certified Dealer who is dedicated to great service, and saving you time and money.

                        </li>
                        <li>
                            <h3>Get Price Confidence</h3>
                            TrueCar analyzes millions of used car listings to determine whether listing prices are above or below market, so you can feel confident in the price you're paying.
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
            url: '/getusedcar',
            dataType: 'JSON',
            data: { id_company: id_company },
            success: function(data) {
                var html = '';
                        html += '<p class="breadcrumbs">';
                        html += '<span>Good choice. Which are Aura are you thinking?</span>';
                        html += '</p>';
                        $.each(data, function(index, value){
                                html +=  '<ul class="sreach">';
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
