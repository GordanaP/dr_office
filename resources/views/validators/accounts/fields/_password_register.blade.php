password: {
    validators: {
        notEmpty: {
            message: 'The password is required.'
        },
        stringLength: {
            min: 6,
            message: 'The password must be at least 6 characters long.'
        },
        different: {
            field: 'name',
            message: 'The password must not be the same as the name.'
        }
    }
}