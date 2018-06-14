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
                    minlength: 2,
                    maxlength: 20,
                    checkExitsted: {
                        requestUrl : "{{ route('product.checkName') }}",
                        modelId: '{{ $car->id }}'
                     }
                },
                car_number: {
                    required: true,
                    min: 0,
                    max: 999999999,
                    number: true
                },
                gear: {
                    number: true,
                    min: 0,
                    max: 30
                },
                car_cost: {
                    required: true,
                    min: 0,
                    max: 99999999999,
                    number: true
                },
                car_year: {
                    required: true,
                    minlength: 4,
                    maxlength: 4,
                    number: true
                },
                height: {
                    number: true,
                    min: 0,
                    max:1000
                },
                weight: {
                    number: true,
                    min: 0,
                    max: 1000
                },
                width: {
                    number: true,
                    min: 0,
                    max: 1000
                },
                colc: {
                    number: true,
                    min: 0,
                    max: 1000
                },
                max_capacity: {
                    number: true,
                    min: 0,
                    max: 5000,
                },
                cylinder_capacity: {
                    number: true,
                    min: 0,
                    max: 1000,
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
