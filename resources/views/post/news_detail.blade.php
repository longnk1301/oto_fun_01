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
        
        <div class="img-details-post">
            <img src="{{ asset($post->image) }}" alt="">
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
