$('.account-form').formValidation({
    @include('validators.general._framework'),
    fields: {
        @include('validators.accounts.fields._name'),
        @include('validators.accounts.fields._email'),
        @include('validators.accounts.fields._password'),
        @include('validators.accounts.fields._password_confirmation'),
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