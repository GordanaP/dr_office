var role = $('#updateRole').val()
var rolesUpdateUrl = rolesIndexUrl + '/' + role

$.ajax({
    url : rolesUpdateUrl,
    type: "PUT",
    data: data,
    success: function(response) {

        $('#displayRoles').load(location.href + " #displayRoles")
        successResponse(roleModal, response.message)
    },
    error: function(response) {

        errorResponse(response.responseJSON.errors, roleModal)
    }
})