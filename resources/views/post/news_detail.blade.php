@extends('layouts.index')

@section('content')
<div class="container post clearfix">
    <div class="row">
        <h1>
            <p>{{ $post->title }}</p>
        </h1>
        <p>
            <b>{{ trans('auth.author') }}: </b>{{ $post->created_by }} | {{ $post->created_at }}
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
