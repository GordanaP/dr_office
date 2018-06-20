$(document).on('click', '#addEditSchedule', function()
{
    @include('test.partials._dynamicFields')

    $('#editFormGroups').append(html)
})