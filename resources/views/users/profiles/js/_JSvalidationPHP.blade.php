var profileForm = $('#userProfileForm')

profileForm.formValidation({
    @include('validators.general._framework'),
    fields: {
        @include('validators.profiles._fields')
    }
})
.on('keyup', '[name="name"], [name="about"], [name="location"]', function(e) {

        @include('validators.profiles._onkeyup')
})