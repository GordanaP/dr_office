$(document).on('click', '#saveEducation', function(){

    var user = $(this).val()
    var updateProfileUrl = '/admin/profiles/' + user

    var education = $('#education').val();

    var data = {
        'education': education
    }

    $.ajax({
        url: updateProfileUrl,
        type: 'PATCH',
        data: data,
        success: function(response) {

            $('#userEducation').load(location.href + ' #userEducation')

            successResponse(educationModal, response.message)
        },
        error: function(response) {
            errorResponse(educationModal, jsonErrors(response))
        }
    })
});