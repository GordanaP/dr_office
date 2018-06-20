$(document).on('click', '#addCreateSchedule', function()
{
    @include('test.partials._dynamicFields')

    $('#createFormGroups').append(html)
})