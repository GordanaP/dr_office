$(document).on('click', '#updateRole', function() {

    var data = {
        name: roleName.val()
    }

    var role = $(this).val()
    var updateRoleUrl = rolesIndexUrl + '/' + role

    $.ajax({
        url : updateRoleUrl,
        type: "PUT",
        data: data,
        success: function(response) {

            $('#displayRoles').load(location.href + " #displayRoles")
            successResponse(roleModal, response.message)
        },
        error: function(response) {

            errorResponse(roleModal, jsonErrors(response))
        }
    })
});