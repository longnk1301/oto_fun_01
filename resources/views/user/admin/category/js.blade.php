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
            var cateName = $('#cateName').val();
            cateName = cateName.trim();
            if(cateName == "" || cateName == null) {
                return false;
            }
            //gui request lay ra url moi
            $.ajax({
                url: "{{ route('getSlug') }}",
                method: 'post',
                data: {
                    value : cateName,
                    _token: $('#ajaxToken').val()
                },
                dataType: "JSON",
                success: function (rs) {
                    $('#slug').val(rs.data);
                }
            });
        });


        $('#cate-form').validate({
            rules: {
                category_name: {
                    required: true,
                    checkExitsted: {
                        requestUrl : "{{route('cate.checkName')}}",
                        modelId: '{{$model->id}}'
                     }
                },
                slug: {
                    required: true,
                    checkExitsted: {
                        requestUrl: "{{route('cate.checkSlug')}}",
                        modelId: '{{$model->id}}'
                     }
                },
                parent_id: {
                    required: true
                    },
            },
            messages: {
                cate_name: {
                    required: '{{ trans('auth.pl_enter_name_cate') }}',
                    checkExitsted: '{{ trans('auth.the_cate_already_exixts') }}'
                },
                slug: {
                    required: '{{ trans('auth.pl_enter_the_path') }}',
                    checkExitsted: '{{ trans('auth.the_path_already_exixts') }}'
                },
                parent_id: {
                    required: '{{ trans('auth.pl_enter_cate') }}'
                },
                tags: {
                    required: '{{ trans('auth.pl_enter_tag') }}',
                    checkExitsted: '{{ trans('auth.the_cate_already_exixts') }}'
                }
            },
            errorPlacement: function(error, element)
            {
                $(error).addClass('text-danger');
                error.insertAfter(element);
            }
        });
    });
</script>