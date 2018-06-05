$(document).on('click', '#revokeRoles', function(){

    var user = $(this).val()
    var revokeRolesUrl = '/admin/roles-revoke/' + user

    var roleIds = checkedValues('role_id')

    var data = {
        role_id: roleIds
    }

    $.ajax({
        url: revokeRolesUrl,
        type: "DELETE",
        data: data,
        success: function(response)
        {
            datatable.ajax.reload()
            successResponse(revokeRolesModal, response.message)
        },
        error: function(response) {
            errorResponse(response.responseJSON.errors, revokeRolesModal)
        }
    })
})