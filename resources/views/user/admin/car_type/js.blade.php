<script>
    $(document).ready(function () {
        $('#car-type-form').validate({
            rules: {
                type: {
                    required: true,
                    maxlength: 10,
                    minlength: 2,
                    checkExitsted: {
                        requestUrl : "{{route('car_type.checkName')}}",
                        modelId: '{{$model->id}}'
                     }
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