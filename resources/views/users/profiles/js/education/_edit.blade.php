$(document).on('click', '#editEducation', function() {

    educationModal.modal('show');

    var user = $(this).attr('data-user')
    var showProfileUrl = '/admin/profiles/' + user

    $('.modal-title span').text('Education')
    $('#saveEducation').text('Save').val(user)

    $.ajax({
        url: showProfileUrl,
        type: "GET",
        success: function(response)
        {
            var profile = response.profile

            $('#education').val(profile.education)
        }
    })
});