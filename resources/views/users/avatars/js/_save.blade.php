var user = $('#saveAvatar').val()
var updateAvatarUrl = '/admin/avatars/' + user

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
        if(datatable) {
            datatable.ajax.reload()
        }

        $('#displayUserAvatar').load(location.href + ' #displayUserAvatar')
        $('#myAvatar').load(location.href + ' #myAvatar')

        successResponse(avatarModal, response.message)
    },
    error: function(response)
    {
        errorResponse(response.responseJSON.errors, avatarModal)
    }
})