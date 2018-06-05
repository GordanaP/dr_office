$('.login-form').formValidation({
    @include('validators.general._framework'),
    fields: {
        @include('validators.accounts.fields._email'),
        password: {
            validators: {
                notEmpty: {
                    message: 'The password is required.'
                },
            }
        },
    }
})
.on('err.field.fv', function(e, data) {

    var invalidFields = data.fv.getInvalidFields()

    removeServerSideValidationFeedback(invalidFields)

})
.on('success.field.fv', function(e, data) {

    var validFields = data.element

    removeServerSideValidationFeedback(validFields)
});
