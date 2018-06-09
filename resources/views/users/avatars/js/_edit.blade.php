$(document).on('click', '#changeAvatar', function(){

    avatarModal.modal('show')

    var profile = $(this).attr('data-profile')
    var username = $(this).attr('data-name')
    var editAvatarUrl = '/admin/avatars/' + profile

    $('.modal-title span').text(username)
    $('#saveAvatar').val(profile)

    $.ajax({
        url: editAvatarUrl,
        type: "GET",
        success: function(response)
        {
            var filename = response.profile.avatar ? response.profile.avatar.filename : 'default.jpg'

            avatarModal.find('#showAvatar').html(setAvatar(filename, 'image img-responsive rounded-circle'))
        }
    })
})