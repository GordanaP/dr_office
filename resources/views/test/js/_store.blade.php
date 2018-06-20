$(document).on('click', '#storeSchedule', function(){

    var day = createScheduleArray(scheduleArrayName, chunkSize)

    $.ajax({
        url: scheduleUrl,
        type: "PATCH",
        data: {
            day: day
        },
        success: function(response)
        {
            $('#deleteButton').removeClass('is-hidden')
            $('#displaySchedule').load(location.href + ' #displaySchedule')
            $('.btn-schedule').attr('id', 'editSchedule').text('Change')

            successResponse(createScheduleModal, response.message)
        },
        error: function(response)
        {
            errorResponse(createScheduleModal, jsonErrors(response))
        }
    })
})