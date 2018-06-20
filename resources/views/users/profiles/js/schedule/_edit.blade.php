$(document).on('click', '#editSchedule', function(){

    editScheduleModal.modal('show')

    var showProfileUrl = '/tests/' + profile

    $.ajax({
        url: showProfileUrl,
        type: 'GET',
        success : function(response)
        {
            $('#workingDaysUpdated').html(response.html)
        }
    });
})