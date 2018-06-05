var user = $('#updateAccount').val()
var adminAccountsUpdateUrl = adminAccountsUrl + '/' + user

var password = changePassword()
var checked = $("form input[type='radio']:checked").val();

var data = {
    role_id: $("#_role_id").val(),
    name : $("#_name").val(),
    email : $("#_email").val(),
    create_password: checked,
    password: password,
    password_confirmation: password,
}

$.ajax({
    url : adminAccountsUpdateUrl,
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