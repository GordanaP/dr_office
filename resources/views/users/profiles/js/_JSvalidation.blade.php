profileForm.formValidation({
    @include('validators.general._framework'),
    excluded: ':disabled', // form in BS modal
    fields: {
        @include('validators.profiles._fields')
    }
})
.on('keyup', '[name="name"], [name="about"], [name="location"]', function(e) {

        @include('validators.profiles._onkeyup')
})
.on('success.form.fv', function(e) {

    e.preventDefault();

    @include('users.profiles.js._save')
})
