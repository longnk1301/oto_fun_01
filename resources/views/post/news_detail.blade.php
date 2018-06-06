@extends('layouts.index')

@section('content')
<div class="container post clearfix">
    <div class="row detail-post">
        <h1>
            <p>{{ $post->title }}</p>
        </h1>
        <p class="created-at">
            <b>{{ trans('auth.created_at') }} : {{ $post->created_at }}
        </p>
        <a href=" {{ route('news') }}" class="btn btn-light Tooltip">
            <i class="fa fa-reply-all" aria-hidden="true"></i>
            <span class="tooltipText">{{ trans('auth.back') }}</span>
        </a>
        @foreach ($post->tags as $tag)
            <a href="#">{{ $tag->tag }}</a>
        @endforeach

        <div class="img-details-post">
            @foreach ($images as $image)
                <img src="{{ asset($image->image) }}" alt="">
            @endforeach
        </div>

        <div class="summary">
            <p>{{ $post->summary }}</p>
        </div>

        <div class="content">
            <p>{{ $post->content }}</p>
        </div>
    </div>
</div>
@endsection
