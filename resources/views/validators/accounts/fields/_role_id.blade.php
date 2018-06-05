'role_id[]': {
    validators: {
        callback: {
            message: 'Please select roles',
            callback: function(value, validator, $field) {

                var options = validator.getFieldElements('role_id[]').val();
                return (options != null && options.length >= 0);
            }
        }
    }
}