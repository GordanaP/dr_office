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
            $('#displayUserAvatar').load(location.href + ' #displayUserAvatar')
            $('#profileAvatar').load(location.href + ' #profileAvatar')

            successResponse(avatarModal, response.message)
        },
        error: function(response)
        {
            errorResponse(response.responseJSON.errors, avatarModal)
        }
    })
})