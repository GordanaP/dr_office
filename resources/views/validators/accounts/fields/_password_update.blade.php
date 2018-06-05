password: {
    validators: {
        callback: {
            message: 'Please give the password to the user',
            callback: function(value, validator, $field) {

                var checked = getCheckedValue(editAccountForm, 'create-password')

                return (checked !== 'manual') ? true : (value !== '')
            }
        },
        different: {
            field: 'name',
            message: 'The password must not be the same as the name.'
        },
        stringLength: {
            min: 6,
            message: 'The password must be at least 6 characters long.'
        }
    }
}