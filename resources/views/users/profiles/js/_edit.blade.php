$(document).on('click', '#editProfile', function(){

    $('#profileModal').modal('show')
    $('#deleteProfile').hide()

    var user = $(this).attr('data-user') || $(this).val()
    // var username = $(this).attr('data-name')
    var showProfileUrl = '/admin/profiles/' + user

    $('.modal-title i').addClass('fa-user')
    // $('.modal-title span').text(username)
    $('#saveProfile').val(user)
    $('#deleteProfile').val(user)

    $.ajax({
        url: showProfileUrl,
        type: "GET",
        success: function(response) {

            var profile = response.profile

            $('#title').val(profile.title)
            $('#first_name').val(profile.first_name)
            $('#last_name').val(profile.last_name)
        }
    })
})