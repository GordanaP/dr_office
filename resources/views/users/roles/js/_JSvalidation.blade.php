roleForm.formValidation({
    framework: 'bootstrap4',
    excluded: ':disabled',
    icon: {
        valid: 'fa fa-check',
        invalid: 'fa fa-times',
        validating: 'fa fa-refresh'
    },
    fields: {
        name: {
            validators: {
                notEmpty: {
                    message: 'The name is required.'
                },
                regexp: {
                    regexp: /^[A-za-z0-9 ]+$/i,
                    message: 'Only alphabetical characters, numbers and spaces are allowed.'
                },
                stringLength: {
                    max: 50,
                    message: 'The name must be less than 50 characters long.'
                }
            }
        },
    }
})
.on('success.form.fv', function(e) {

    // form button must be type="submit"!!!
    e.preventDefault();

    var data = {
        name: $('#name').val()
    }

    // Store role
    if($(".btn-role").attr('id') == 'storeRole') {

        @include('users.roles.js._store')
    }

    // Update role
    if($(".btn-role").attr('id') == 'updateRole') {

        @include('users.roles.js._update')
    }
});