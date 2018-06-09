$(document).on('click', '#editAccount', function() {
    editAccountModal.modal('show')

    var user = $(this).val() || $(this).attr('data-user')
    var editAccountUrl = adminAccountsUrl + '/' + user

    $('#updateAccount').val(user)

    toggleHiddenFieldWithRadio('manual', _password)

    $.ajax({
        url: editAccountUrl,
        type: "GET",
        success: function(response) {
            var user = response.user

            var roleIds = getUserRoles(user.roles)

            $("#_role_id").val(roleIds).trigger("change");
            $('#_first_name').val(user.profile.name)
            $('#_email').val(user.email)
        }
    })
});