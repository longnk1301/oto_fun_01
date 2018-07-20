<script>
    $(document).ready(function () {
        $('#color-form').validate({
            rules: {
                color: {
                    required: true,
                    maxlength: 10,
                    minlength: 2,
                    checkExitsted: {
                        requestUrl : "{{route('color.checkName')}}",
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