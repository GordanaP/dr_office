$(document).on('click', '#storeRole', function() {

    var data = {
        name: roleName.val()
    }

    $.ajax({
        url: rolesIndexUrl,
        method: "POST",
        data: data,
        success: function(response)
        {
            $('#displayRoles').load(location.href + " #displayRoles") //!!! mind blank space !!!
            successResponse(roleModal, response.message)
        },
        error: function(response) {

            errorResponse(roleModal, jsonErrors(response))
        }
    })
});