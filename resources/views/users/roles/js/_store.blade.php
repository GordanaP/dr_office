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

        errorResponse(response.responseJSON.errors, roleModal)
    }
})