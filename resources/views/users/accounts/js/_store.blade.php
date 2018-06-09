$(document).on('click', '#storeAccount', function() {

    var passwordField = $("#auto_password");
    var password = generatePassword(passwordField);

    var data = {
        role_id: $("#role_id").val(),
        title : $("#title").val(),
        first_name : $("#first_name").val(),
        last_name : $("#last_name").val(),
        email : $("#email").val(),
        password: password,
    }

    $.ajax({
        url: adminAccountsUrl,
        type: "POST",
        data: data,
        success: function(response) {

            datatable.ajax.reload()
            successResponse(createAccountModal, response.message)
        },
        error: function(response) {
            errorResponse(response.responseJSON.errors, createAccountModal)
        }
    })
})