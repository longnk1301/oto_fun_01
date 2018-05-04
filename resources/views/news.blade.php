<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-6 panel panel-default">
               @foreach ($posts as $p)
                   <div class="post">
                      <div>
                        @if ($p->getCate() != null)
                          <p>
                            <strong>
                              <a href="#">{{ $p->getCate()->cate_name }}</a>
                            </strong>
                          </p>
                        @endif
                        <p><strong>{{ $p->title }}</strong></p>
                      </div>

                      <div>
                        <a href="{{url($p->slug)}}">
                          <img src="{{asset('images/acura_96x96.png')}}" alt="">
                        </a>
                      </div>

                      <div>
                        <p>{{ $p->content }}</p>
                      </div>
                   </div>
               @endforeach
            </div>

        </div>
    </div>
</div>