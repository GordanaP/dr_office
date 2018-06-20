$(document).on('click', '#add', function(){

    i++

    var fields = $(".field"),
        totalFields = fields.length,
        maxFields = 5,
        dynamicFields = makeNewArray(fields),
        index = findMissingValue(dynamicFields)

    if (totalFields < maxFields)
    {
        @include('users.profiles.js.schedule._dynamic_fields')

        $('#workingDaysFields').append(html)
    }
})

$(document).on('click', '.btn-remove', function(){

    $(this).parent('div').remove()
})
