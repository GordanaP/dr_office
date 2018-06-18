$(document).on('click', '#saveAvatar', function() {

    var profile = $(this).val()
    var updateAvatarUrl = '/admin/avatars/' + profile

    var formData = new FormData(avatarForm[0])
    formData.append('_method', 'PUT');


    $.ajax({
        url : updateAvatarUrl,
        type : "POST",
        data : formData,
        contentType: false,
        processData: false,
        success: function(response)
        {
            $('#userProfileAvatar').load(location.href + ' #userProfileAvatar')
            $('#authProfileAvatar').load(location.href + ' #authProfileAvatar')

            successResponse(avatarModal, response.message)
        },
        error: function(response)
        {
            errorResponse(avatarModal, jsonErrors(response))
        }
    })
})