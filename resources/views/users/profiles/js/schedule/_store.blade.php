$(document).on('click', '#storeSchedule', function()
{
    var day = createScheduleArray('day', 3)
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
            errorResponse(response.responseJSON.errors, createScheduleModal)
        }
    })
})