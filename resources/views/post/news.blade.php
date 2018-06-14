@extends('layouts.index')

@section('content')
<div class="container post clearfix">
    <div class="row">
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
        <nav>
            <ul>
                @foreach ($parent_categories as $category)
                    <li class="btn btn-primary"><a href="{{ route('cate.detail', $category->slug) }}">{{ $category->category_name }}</a></li>
                @endforeach
            </ul>
        </nav>
        @foreach ($posts as $p)
            <div class="col-md-4">
                <div class="post-single">
                    <ul>
                        @if ($p->category_id != null)
                          <p>
                            <strong>
                              <a class="cate_name" href="{{ route('cate.detail', $p->category_id->slug) }}">{{ str_limit($p->category_id->category_name, 30, '...') }}</a>
                            </strong>
                          </p>
                        @endif
                        <li></li>
                    </ul>
                    <div class="post-img">
                        <a href="{{ url($p->slug) }}">
                            @if (!isset($p->imgPost->image))
                                {{ null }}
                            @else
                                <img src="{{ asset($p->imgPost->image) }}" alt="">
                            @endif
                        </a>
                    </div>
                    <div class="post-title">
                        <h4>
                            <a href="{{ url($p->slug)}}">{{ str_limit($p->title, 50, '...') }}</a>
                        </h4>
                    </div>
                    <div class="author">
                        <a href="{{ url($p->slug)}}">{{ $p->created_at }}</a>
                    </div>
                    <p>{!! str_limit($p->summary, 80, '...') !!}</p>
                    <a  class="read-more" href="{{ url($p->slug) }}">
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
