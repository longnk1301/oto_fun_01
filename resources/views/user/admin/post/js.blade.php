<script>
    CKEDITOR.replace('editor1');
</script>

<script>
    $(document).ready(function () {
        // show image
        $('#image').change(function(event) {
            var tmppath = URL.createObjectURL(event.target.files[0]);
            $('#Image').attr('src',tmppath);
        });

        //tao slug
        $('.btn-asl-form').on('click', function() {
            var title = $('#title').val();
            title = title.trim();
            if(title == "" || title == null) {
                return false;
            }
            //gui request lay ra url moi
            $.ajax({
                url: "{{ route('getSlug') }}",
                method: 'post',
                data: {
                    value : title,
                    _token: $('#ajaxToken').val()
                },
                dataType: "JSON",
                success: function (rs) {
                    $('#slug').val(rs.data);
                }
            });
        });

        $('#post-form').validate({
            rules: {
                title: {
                    required: true
                },
                slug: {
                    required: true,
                    checkExitsted: {
                        requestUrl: "{{route('post.checkSlug')}}",
                        modelId: '{{$model->id}}'
                    }
                },
                tags: {
                    required: true,
                    checkExitsted: {
                        requestUrl: "{{route('post.checkTag')}}",
                        modelId: '{{$model->id}}'
                    }
                },
                image: {
                    required: true
                },
            },
            messages: {
                title: {
                    required: '{{ trans('auth.pl_enter_name_post') }}'
                },
                slug: {
                    required: '{{ trans('auth.pl_enter_the_path') }}',
                    checkExitsted: '{{ trans('auth.the_path_already_exixts') }}'
                },
                cate_id: {
                    required: '{{ trans('auth.pl_enter_name_cate') }}'
                },
                tags: {
                    required: '{{ trans('auth.pl_enter_tag') }}',
                    checkExitsted: '{{ trans('auth.the_cate_already_exixts') }}',
                },
            },
            errorPlacement: function(error, element)
            {
                $(error).addClass('text-danger');
                error.insertAfter(element);
            }
        });
    });
</script>