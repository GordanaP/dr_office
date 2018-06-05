var user = $('#saveProfile').val()
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
        $('#myProfile').load(location.href + ' #myProfile')
        $('#myProfileName').load(location.href + ' #myProfileName')
        successResponse(profileModal, response.message)
    },
    error: function(response) {
        errorResponse(response.responseJSON.errors, profileModal)
    }
})