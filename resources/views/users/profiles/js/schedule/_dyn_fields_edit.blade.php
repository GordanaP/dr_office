$(document).on('click', '#addDay', function(){

    i++

    var fields = $(".field"),
        totalFields = fields.length,
        maxFields = 5,
        dynamicFields = makeNewArray(fields),
        index = findMissingValue(dynamicFields)

    if (totalFields < maxFields)
    {
        @include('users.profiles.js.schedule._dynamic_fields')

        $('#workingDaysUpdated').append(html)
    }
})