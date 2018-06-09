$(document).on('click', '#saveProfile', function() {

    var user = $(this).val()
    var updateProfileUrl = '/admin/profiles/' + user

    var data = {
        name : $("#profileName").val(),
        about : $("#about").val(),
        location : $("#location").val(),
    }

    $.ajax({
        url: updateProfileUrl,
        type: "PUT",
        data: data,
        success: function(response) {

            $('#userProfile').load(location.href + ' #userProfile')
            $('#displayUserName').load(location.href + ' #displayUserName')

            successResponse(profileModal, response.message)
        },
        error: function(response) {
            errorResponse(response.responseJSON.errors, profileModal)
        }
    })
});