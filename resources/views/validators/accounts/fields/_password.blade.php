password: {
    validators: {
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