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
                        requestUrl : "{{route('cate.checkName')}}",
                        modelId: '{{$model->id}}'
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
                car_years: {
                    required: true,
                    number: true
                },
                tags: {
                    required: true
                },
                interior_color: {
                    required: true
                },
                exterior_color: {
                    required: true
                },
                transmission: {
                    required: true
                },
                engine: {
                    required: true
                },
                mileage: {
                    number: true
                },
                fuel_type: {
                    required: true
                },
                drive_type: {
                    required: true
                },
                mpg: {
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
                interior_color: {
                    required: '{{ trans('auth.pl_enter_car_color') }}'
                },
                exterior_color: {
                    required: '{{ trans('auth.pl_enter_car_color') }}'
                },
                transmission: {
                    required: '{{ trans('auth.pl_enter_car_trans') }}'
                },
                engine: {
                    required: '{{ trans('auth.pl_enter_car_engine') }}'
                },
                mileage: {
                    number: '{{ trans('auth.pl_enter_number') }}'
                },
                fuel_type: {
                    required: '{{ trans('auth.pl_enter_fuel') }}'
                },
                drive_type: {
                    required: '{{ trans('auth.pl_enter_drive') }}'
                },
                mpg: {
                    required: '{{ trans('auth.pl_enter_mpg') }}'
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