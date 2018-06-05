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

        $('#product-form').validate({
            rules: {
                car_name: {
                    required: true,
                    checkExitsted: {
                        requestUrl : "{{ route('product.checkName') }}",
                        modelId: '{{ $car->id }}'
                     }
                },
                car_number: {
                    required: true,
                    number: true
                },
                car_cost: {
                    required: true,
                    number: true
                },
                car_year: {
                    required: true,
                    number: true
                },
                image: {
                    required: true
                },
            },
            messages: {
                car_name: {
                    required: '{{ trans('auth.pl_enter_name_cate') }}'
                },
                car_number: {
                    required: '{{ trans('auth.pl_enter_quantity') }}',
                    number: '{{ trans('auth.pl_enter_number') }}'
                },
                car_cost: {
                    required: '{{ trans('auth.pl_enter_cost') }}',
                    number: '{{ trans('auth.pl_enter_number') }}'
                },
                car_years: {
                    required: '{{ trans('auth.pl_enter_year') }}',
                    number: '{{ trans('auth.pl_enter_number') }}'
                },
                tags: {
                    required: '{{ trans('auth.pl_enter_tag') }}'
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