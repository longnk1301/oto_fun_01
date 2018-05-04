<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-6 panel panel-default">
               @foreach ($car as $c)
                   <div class="car">
                        <p>{{ $c->car_name }}</p>

                        <p>{{ $c->image }}</p>

                        <p>{{ $c->car_type }}</p>

                        <p>{{ $c->car_company }}</p>

                        <p>{{ $c->car_color }}</p>

                        <p>{{ $c->car_years }}</p>
                   </div>
               @endforeach
            </div>
        </div>
    </div>
</div>