name: {
    // enabled: false,
    validators: {
        notEmpty: {
            message: 'Please provide at least one field value'
        },
        regexp: {
            regexp: /^[A-za-z0-9 ]+$/i,
            message: 'Only alphabetical characters, numbers, and spaces are allowed'
        },
        stringLength: {
            max: 30,
            message: 'The name must be less than 30 characters long'
        }
    }
},
about: {
    // enabled: false,
    validators: {
        notEmpty: {
            message: 'Please provide at least one field value'
        },
        stringLength: {
            max: 150,
            message: 'The value must be less than 150 characters long'
        }
    }
},
location: {
    // enabled: false,
    validators: {
        notEmpty: {
            message: 'Please provide at least one field value'
        },
        stringLength: {
            max: 50,
            message: 'The value must be less than 50 characters long'
        }
    }
}