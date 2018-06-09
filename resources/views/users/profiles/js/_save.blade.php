$(document).on('click', '#saveProfile', function() {

    var user = $(this).val()
    var updateProfileUrl = '/admin/profiles/' + user

    var data = {
        title : $("#title").val(),
        first_name : $("#first_name").val(),
        last_name : $("#last_name").val(),
    }

    $.ajax({
        url: updateProfileUrl,
        type: "PUT",
        data: data,
        success: function(response) {

            $('#userProfileName').load(location.href + ' #userProfileName')
            $('#userProfile').load(location.href + ' #userProfile')

            $('#authProfileName').load(location.href + ' #authProfileName')

            successResponse(profileModal, response.message)
        },
        error: function(response) {
            errorResponse(response.responseJSON.errors, profileModal)
        }
    })
});