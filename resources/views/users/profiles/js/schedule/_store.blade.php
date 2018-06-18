$(document).on('click', '#storeSchedule', function()
{
    var chunkSize = 3;
    var day = createScheduleArray('day', chunkSize);
    var storeScheduleUrl = '/admin/working_days/' + profile

    $.ajax({
        url: storeScheduleUrl,
        type: "PATCH",
        data: {
            day: day
        },
        success: function(response)
        {
            $('#displaySchedule').load(location.href + ' #displaySchedule')
            $('.btn-schedule').text('Change')

            successResponse(createScheduleModal, response.message)
        },
        error: function(response)
        {
            errorResponse(createScheduleModal, jsonErrors(response))
        }
    })
})