$(document).on('click', '#updateAccount', function() {

    var user = $(this).val()
    var updateAccountUrl = adminAccountsUrl + '/' + user

    var roleId = $("#_role_id").val(),
        title = $("#_title").val(),
        firstName = $("#_first_name").val(),
        lastName = $("#_last_name").val(),
        email = $("#_email").val(),
        password = changePassword(),
        checked = $("form input[type='radio']:checked").val();

    var data = {
        role_id: roleId,
        title : title,
        first_name : firstName,
        last_name : lastName,
        email : email,
        create_password: checked,
        password: password,
        password_confirmation: password,
    }

    $.ajax({
        url : updateAccountUrl,
        type : "PUT",
        data: data,
        success : function(response) {
            $('#myAccount').load(location.href + ' #myAccount')
            $('#displayUserName').load(location.href + ' #displayUserName')

            datatable ? datatable.ajax.reload() : ''

            successResponse(editAccountModal, response.message)
        },
        error: function(response) {
            errorResponse(response.responseJSON.errors, editAccountModal)
        }
    })
});