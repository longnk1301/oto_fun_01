@extends('layouts.index')

@section('content')
<div class="container post clearfix">
    <div class="row mg">
        {!! Form::open(['method' => 'get', 'url' => route('client.search.post')]) !!}
                <div class="col-md-8">
                    <div class="suggest">
                        {!! Form::text('keyword', '', ['class' => 'form-control', 'placeholder' => trans('index.search_post')]) !!}
                    </div>
                </div>
                <div class="col-md-4">
                    <div>
                        {!! Form::submit( trans('index.go'), ['class'=> 'btn btn-info']) !!}
                    </div>
                </div>
        {!! Form::close() !!}
    </div>
    <h1>{!! trans('index.key') !!} {{ $request->keyword }}</h1>
    <p><strong>{!! trans('index.has') !!} {{ count($posts) }} {!! trans('index.rs') !!}</strong></p>
    <div class="row">
        @foreach ($posts as $p)
            <div class="col-md-4">
                <div class="post-single">
                    <ul>
                        @if ($p->category_id != null)
                          <p>
                            <strong>
                              <a href="{{ route('cate.detail', $p->category_id->slug) }}">{{ $p->category_id->cate_name }}</a>
                            </strong>
                          </p>
                        @endif
                        <li></li>
                    </ul>
                    <div class="post-img">
                        <a href="{{ url($p->slug)}}">
                            <img src="{{ asset('images/products/side.jpeg') }}" alt="">
                        </a>
                    </div>
                    <div class="post-desk">
                        <h4>
                            <a href="{{ url($p->slug) }}">{{ str_limit($p->title, 20, '...') }}</a>
                        </h4>
                    </div>
                    <div class="date">
                        <a href="{{ url($p->slug) }}">{{ $p->created_by }}</a>
                    </div>
                    <p>{{ $p->summary }}</p>
                    <a href="{{ url($p->slug) }}">
                        {!! trans('index.readmore') !!}
                    </a>
                </div>
            </div>
        @endforeach

        {{-- paginate --}}
        <div class="col-md-12">
            <div class="text-center">
                {{ $posts->links() }}
            </div>
        </div>
        {{-- end paginate --}}
    </div>
</div>
@endsection
