@extends('layouts.index')

@section('content')
<div class="container post cf">
    <div class="row">
        <p>{{ $post->title }}</p>
        <p>{{ $post->created_by }}</p>
        <p><strong>{{ $post->summary }}</strong></p>
        <p>{{ $post->content }}</p>
    </div>
</div>
@endsection
