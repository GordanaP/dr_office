var avatarForm = $('#userAvatarForm')

avatarForm.formValidation({
    @include('validators.general._framework'),
    fields: {
        @include('validators.avatars._fields'),
    }
})
.on('change', '[name="avatar_options"], [name="avatar"]', function() {

        @include('validators.avatars._onchange')
})