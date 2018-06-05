email: {
    validators: {
        notEmpty: {
            message: 'The email is required.'
        },
        emailAddress: {
            message: 'The value is not a valid email address.'
        },
        stringLength: {
            max: 100,
            message: 'The email address must be less than 100 characters long.'
        }
    }
}