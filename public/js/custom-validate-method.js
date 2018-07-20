var checkExitstedResult = true;
jQuery.validator.addMethod("checkExitsted", function(value, element, attr) {
    $.ajax({
        url: attr.requestUrl,
        method: 'post',
        data: {
            id: attr.modelId,
            name: value,
            _token: $('#ajaxToken').val()
        },
        dataType: 'JSON',
        beforeSend: function() {

        },
        success: function(rs) {
            checkExitstedResult = rs;
        }
    });
    return checkExitstedResult;
}, 'The name already exists!!!');
