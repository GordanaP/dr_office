avatarForm.formValidation({
    @include('validators.general._framework'),
    excluded: ':disabled', // form in BS modal
    fields: {
        @include('validators.avatars._fields'),
    }
})
.on('change', '[name="avatar_options"], [name="avatar"]', function() {

    @include('validators.avatars._onchange')

})
.on('success.form.fv', function(e) {

    e.preventDefault();

    @include('users.avatars.js._save')
})