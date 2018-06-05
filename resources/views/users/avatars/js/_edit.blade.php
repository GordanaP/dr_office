$(document).on('click', '#editAvatar', function(){

    avatarModal.modal('show')

    var user = $(this).attr('data-user')
    var username = $(this).attr('data-name')
    var editAvatarUrl = '/admin/avatars/' + user

    $('.modal-title span').text(username)
    $('#saveAvatar').val(user)

    $.ajax({
        url: editAvatarUrl,
        type: "GET",
        success: function(response)
        {
            var filename = response.filename ? response.filename : 'default.jpg'

            avatarModal.find('#showAvatar').html(setAvatar(filename, 'image img-responsive rounded-circle'))
        }
    })
})