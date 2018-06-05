avatar_options : {
    validators : {
        notEmpty: {
            message: 'Please select an option'
        },
        between: {
           min: 1,
           max: 2,
           message: 'The selected value is invalid'
       }
    }
},
avatar: {
    enabled: false,
    validators: {
        notEmpty: {
            message: 'Please select an image'
        },
        file: {
            extension: 'jpeg,jpg,png, gif',
            type: 'image/jpeg,image/png,image/gif',
            maxSize: 2097152,   // 2048 * 1024
            message: 'The selected file is not valid'
        }
    }
}