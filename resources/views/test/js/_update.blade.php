$(document).on('click', '#updateSchedule', function(){

    var day = createScheduleArray(scheduleArrayName, chunkSize)

    $.ajax({
        url: scheduleUrl,
        type: "PATCH",
        data: {
            day: day
        },
        success: function(response)
        {
            $('#displaySchedule').load(location.href + ' #displaySchedule')

            successResponse(editScheduleModal, response.message)
        },
        error: function(response)
        {
            errorResponse(editScheduleModal, jsonErrors(response))
        }
    })
});