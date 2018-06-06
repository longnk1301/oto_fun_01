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
    <h1>{{ $cate->name }}</h1>
    <a href=" {{ route('news') }}" class="btn btn-light Tooltip">
        <i class="fa fa-reply-all" aria-hidden="true"></i>
        <span class="tooltipText">{{ trans('auth.back') }}</span>
    </a>
    <div class="row">
        @foreach ($posts as $p)
            <div class="col-md-4">
                <div class="post-single">
                    <ul>
                        <p>
                            <strong>
                                <a class="cate_name" href="{{ route('cate.detail',$p->category_id->slug) }}">{{ $p->category_id->category_name }}</a>
                            </strong>
                        </p>
                    </ul>
                    <div class="post-img">
                        <a href="{{ url($p->slug) }}">
                            <img src="{{ asset($p->imgPost->image) }}" alt="">
                        </a>
                    </div>
                    <div class="post-title ">
                        <h4>
                            <a href="{{ url($p->slug) }}">{{ str_limit($p->title, 50, '...') }}</a>
                        </h4>
                    </div>
                    <div class="date author">
                        <a href="{{ url($p->slug) }}">{{ $p->updated_at }}</a>
                    </div>
                    <p>{{ $p->summary }}</p>
                    <a class="read-more" href="{{ url($p->slug) }}">
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
