<div class="bg-color">
    <!-- Content Header (Page header) -->
    <section class="content-header bg-white">
        <div class="image modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            @foreach ($images as $allImage)
                <div class="col-md-6 image-car">
                    <img src="{{ asset($allImage->image) }}" alt="">
                </div>
            @endforeach
        </div>
        <div class="f-right modal-body">
            <a href=" {{ route('post.index') }}" class="btn btn-light Tooltip">
                <i class="fa fa-reply-all" aria-hidden="true"></i>
                <span class="tooltipText">{{ trans('auth.back') }}</span>
            </a>
            
            <a href="javascript:;" onclick="confirmRemove('{{ route('post.remove', ['id' => $detail_post->id]) }}')" class="btn btn-danger Tooltip">
                <i class="fa fa-remove"></i>
                <span class="tooltipText">{{ trans('auth.delete') }}</span>
            </a>
        </div>
        <div class="mg-top1">
            <h2>{{ $category->category_name }}</h2>
            <h1>{{ $detail_post->title }}</h1>
            <h5>{{ $detail_post->updated_at }}</h5>
            @foreach ($detail_post->tags as $tag)
                <span>{{ $tag->tag }}</span>
            @endforeach
            <h3>{{ $detail_post->summary }}</h3>
            <h3>{{ $detail_post->content}}</h3>
	     </div>
    </section>
</div>
@section('js')
    <script>
        function confirmRemove(url) {
            bootbox.confirm({
                message: '{{ trans('auth.are_you_delete?') }}',
                buttons: {
                    confirm: {
                        label: '{{ trans('auth.yes') }}',
                        className: 'btn-success'
                    },
                    cancel: {
                        label: '{{ trans('auth.no') }}',
                        className: 'btn-danger'
                    }
                },
                callback: function (result) {
                    if(result) {
                        window.location.href = url;
                    }
                }
            });
        }
    </script>
@endsection
