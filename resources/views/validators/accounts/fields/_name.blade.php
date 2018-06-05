name: {
    validators: {
        notEmpty: {
            message: 'The name is required.'
        },
        regexp: {
            regexp: /^[A-za-z0-9]+$/i,
            message: 'Only alphabetical characters and numbers are allowed.'
        },
        stringLength: {
            max: 30,
            message: 'The name must be less than 30 characters long.'
        }
    }
}