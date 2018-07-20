<script>
    $(document).ready(function () {
        $('#company-form').validate({
            rules: {
                com_name: {
                    required: true,
                    maxlength: 10,
                    minlength: 2,
                    checkExitsted: {
                        requestUrl : "{{route('company.checkName')}}",
                        modelId: '{{$model->id}}'
                     }
                },
                com_add: {
                    required: true,
                    maxlength: 20,
                    minlength: 4
                },
                com_phone: {
                    required: true,
                    maxlength: 16,
                    minlength: 10
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