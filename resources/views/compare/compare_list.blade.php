@foreach ($listCar as $key => $value)
    <div class="item" id="parent{{ $key['id'] }}" data-id="{{ $key['id'] }} ">
        <div class="delete-car">
            <a href="#" class="DeleteItem" data-id="{{ $key['id'] }}">
                <i class="fa fa-recycle" aria-hidden="true"></i>
            </a>
        </div>

        <div class="avatar-car">
            <img src="{{ asset('images/products/index.jpeg') }}" alt="">
        </div>

        <div class="info-car">
            <h2 class="name"><a href="#">{{ $key['car_name'] }}</a></h2>
        </div>
    </div>
@endforeach
